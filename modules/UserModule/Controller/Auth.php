<?php
namespace UserModule\Controller;

use UserModule\Controller\Shared as SharedController;
use UserModule\Entity\User as UserEntity;
use UserModule\Entity\AuthUser as AuthUserEntity;

class Auth extends SharedController
{
    protected $userStorage;

    public function signupAction()
    {
        return $this->render('UserModule:auth:signup.html.php');
    }
    
    public function loginAction()
    {
        return $this->render('UserModule:auth:login.html.php');
    }
    
    public function forgotpwAction()
    {
        return $this->render('UserModule:auth:signup.html.php');
    }
    
    public function forgotpwenterAction()
    {
        return $this->render('UserModule:auth:forgotpwenter.html.php');
    }
    
    public function logoutAction() {
        $this->getSession()->clear();
        $this->redirectToRoute('Homepage');
    }
    
    public function signupsaveAction()
    {

        $errors       = $missingFields = array();
        $post         = $this->post();
        $requiredKeys = array('userTitle', 'userFirstName', 'userLastName', 'userEmail', 'userPassword', 'userConfirmPassword');
        $userStorage  = $this->getUserStorage();
        
        // Check for missing fields, or fields being empty.
        foreach($requiredKeys as $field) {
            if(!isset($post[$field]) || empty($post[$field])) {
                $missingFields[] = $field;
            }
        }
        
        // If any fields were missing, inform the client
        if(!empty($missingFields)) {
            $errors[] = 'Missing fields';
            return $this->render('UserModule:auth:signup.html.php', compact('errors'));
        }
        
        // Check if the user's passwords do not match
        if($post['userPassword'] !== $post['userConfirmPassword']) {
            $errors[] = 'Passwords do not match';
            return $this->render('UserModule:auth:signup.html.php', compact('errors'));
        }
        
        // Check if the user's email address already exists
        if($userStorage->existsByEmail($post['userEmail'])) {
            $errors[] = 'That email address already exists';
            return $this->render('UserModule:auth:signup.html.php', compact('errors'));
        }
        
        // Prepare user array for insertion
        $user = array(
            'title'           => $post['userTitle'],
            'email'           => $post['userEmail'],
            'firstname'       => $post['userFirstName'],
            'lastname'        => $post['userLastName'],
            'password'        => $post['userPassword'],
            'salt'            => base64_encode(openssl_random_pseudo_bytes(16))
        );
    
        // Create the user
        $newUserID = $userStorage->create($user, $this->getConfigSalt());
        
        // Generate sha1() based activation code
        $activationCode = sha1(openssl_random_pseudo_bytes(16));
        
        // Insert an activation token for this user
        $this->getUserActivationStorage()->create(array(
            'user_id' => $newUserID,
            'token'   => $activationCode
        ));
        
        // Send the user's activation email
        $this->sendActivationEmail($user, $activationCode);
        
        // Successful registration. \o/
        return $this->render('UserModule:auth:signupsuccess.html.php');
        
    }

    public function logincheckAction()
    {
        
        $errors       = $missingFields = array();
        $post         = $this->post();
        $requiredKeys = array('userEmail', 'userPassword');
        $userStorage  = $this->getUserStorage();
        
        // Check for missing fields, or fields being empty.
        foreach($requiredKeys as $field) {
            if(!isset($post[$field]) || empty($post[$field])) {
                $missingFields[] = $field;
            }
        }
        
        // If any fields were missing, inform the client
        if(!empty($missingFields)) {
            $errors[] = 'Missing fields';
            return $this->render('UserModule:auth:login.html.php', compact('errors'));
        }

        // Lets try to authenticate the user
		if(!$userStorage->checkAuth($post['userEmail'], $post['userPassword'], $this->getConfigSalt()))
        {
            $errors[] = 'Login Invalid';
            return $this->render('UserModule:auth:login.html.php', compact('errors'));
        }
        
        // Get user record
        $userEntity = $userStorage->getByEmail($post['userEmail']);

        // Check if user is activated
        if(!$this->getUserActivationStorage()->isActivated($userEntity->getID())) {
            $errors[] = 'Account not activated';
            return $this->render('UserModule:auth:login.html.php', compact('errors'));
        }
        
        // Lets populate the session with the user's auth information
        $this->setAuthData(new AuthUserEntity($userStorage->findByEmail($post['userEmail'])));
        
        // Login Successful. \o/
        $this->setFlash('success', 'Login Successful');
        $this->redirectToRoute('Homepage');
        
    }
    
    public function forgotpwsendAction()
    {
        
        $response = array('status' => 'E_UNKNOWN');
        $email    = $this->post('email');
        $us       = $this->getUserStorage();
        
        // Check for missing field
        if(empty($email)) {
            $response['status'] = 'E_MISSING_FIELD';
            $response['error_value'] = 'email';
            $this->renderJsonResponse($response);
        }
        
        // Check if user record does not exist
        if(!$us->existsByEmail($email)) {
            $response['status'] = 'E_MISSING_RECORD';
            $this->renderJsonResponse($response);
        }
        
        $forgotUser  = $us->getByEmail($email);
        $forgotToken = sha1(openssl_random_pseudo_bytes(16));
        
        // Insert a forgot token for this user
        $this->getUserForgotStorage()->create(array(
            'user_id' => $forgotUser->getID(),
            'token'   => $forgotToken
        ));
        
        // Lets send the user forgotpw email
        $this->sendForgotPWEmail($forgotUser, $forgotToken);
        
        // Successful response
        $response['status'] = 'success';
        $this->renderJsonResponse($response);
        
    }
    
    public function forgotpwcheckAction()
    {
        
        $token = $this->getRouteParam('token');
        $fs = $this->getUserForgotStorage();
        
        // If the user has not activated their token before, activate it!
        if(!$fs->isUserActivatedByToken($token)) {
            
            $fs->useToken($token);
            
            // Lets generate a CSRF token for the update password page.
            $csrf = sha1(openssl_random_pseudo_bytes(16));
            $this->getSession()->set('forgotpw_csrf', $csrf);
            $this->getSession()->set('forgotpw_token', $token);
            
            // Render the 'enter your new password' view
            return $this->render('UserModule:auth:forgotpwenter.html.php', compact('csrf'));
        }
        
        // redirect the user to the login page
        $this->redirectToRoute('User_Signup');
    }
    
    public function forgotpwsaveAction() {
        
        $post          = $this->post();
        $requiredKeys  = array('password', 'confirm_password', 'csrf');
        
        // Check for missing fields, or fields being empty.
        foreach($requiredKeys as $field) {
            if(!isset($post[$field]) || empty($post[$field])) {
                $missingFields[] = $field;
            }
        }
        
        // If any fields were missing, inform the client
        if(!empty($missingFields)) {
            $response['status']       = 'E_MISSING_FIELD';
            $response['error_value']  = implode(',', $missingFields);
            $this->renderJsonResponse($response);
        }
        
        // Check if both passwords match
        if($post['password'] !== $post['confirm_password']) {
            $response['status'] = 'E_PASSWORD_MISMATCH';
            $this->renderJsonResponse($response);
        }
        
        // Check for csrf protection
        $csrf = $this->session('forgotpw_csrf');
        if(empty($csrf) || $csrf !== $post['csrf']) {
            $response['status'] = 'E_INVALID_CSRF';
            $this->renderJsonResponse($response);
        }
        
        // Get the user record out of the session token
        $token = $this->session('forgotpw_token');
        if(empty($token)) {
            $response['status'] = 'E_MISSING_TOKEN';
            $this->renderJsonResponse($response);
        }
        
        // Get user entity from the userID on the token row
        $us = $this->getUserStorage();
        $userEntity = $us->getByID($this->getUserForgotStorage()->getByToken($token)->getUserID());
        
        // Update the user's password
        $this->getUserStorage()->updatePassword(
            $userEntity->getID(), $userEntity->getSalt(), $this->getConfigSalt(), $post['password']
        );
        
        // Wipe session values clean
        $session = $this->getSession();
        $session->remove('fogotpw_csrf');
        $session->remove('fogotpw_token');
        
        // Return successful response \o/
        $response['status'] = 'success';
        $this->renderJsonResponse($response);
        
    }

    /**
     * Activation action. Active the user's account
     */
    public function activateAction() {
        
        $token = $this->getRouteParam('token');
        $uas = $this->getUserActivationStorage();
        
        // If the user has not activated their token before, activate it!
        if(!$uas->isUserActivatedByToken($token)) {
            $uas->activateUser($token);
        }
        
        return $this->render('UserModule:auth:activate.html.php', compact('csrf'));
        
    }

    /**
     * Send the user's activation email to them.
     * 
     * @param \User\Entity\User $toUser
     * @param string            $activationCode
     */
    protected function sendActivationEmail($toUser, $activationCode) {
        
        $fromUser = new UserEntity($this->getEmailConfig());
        $toUser = new UserEntity($toUser);
        
        // Generate the activation link from the route key
        $activationLink = $this->generateUrl('User_Activate', array('token' => $activationCode), true);
        
        // Get the activation email content, it's in a view file.
        $emailContent = $this->render('UserModule:auth:signupemail.html.php', compact('toUser', 'activationLink'));
        
        // Send the activation email to the user
        $helper = new \UserModule\Classes\Email();
        $config = $this->getConfig();
        $helper->sendEmail($fromUser, $toUser, $config['signupEmail']['subject'], $emailContent);
        
    }
    
    /**
     * Send the user's forgotpw email to them.
     * 
     * @param \User\Entity\User|array $toUser
     * @param string                  $activationCode
     * @return void
     */
    protected function sendForgotPWEmail($toUser, $forgotToken) {
        
        // User entity preparation
        $fromUser = new UserEntity($this->getEmailConfig());
        if(is_array($toUser)) {
            $toUser   = new UserEntity($toUser);
        }
        
        // Generate the activation link from the route key
        $forgotLink = $this->generateUrl('User_Forgot_Password_Check', array('token' => $forgotToken), true);
        
        // Get the activation email content, it's in a view file.
        $emailContent = $this->render('UserModule:auth:forgotpwemail.html.php', compact('toUser', 'forgotLink'));
        
        // Send the activation email to the user
        $helper = new \UserModule\Classes\Email();
        $config = $this->getConfig();
        $helper->sendEmail($fromUser, $toUser, $config['forgotEmail']['subject'], $emailContent);
        
    }

}
