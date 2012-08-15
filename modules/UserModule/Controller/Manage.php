<?php
namespace UserModule\Controller;

use UserModule\Controller\Shared as SharedController;
use UserModule\Entity\AuthUser as AuthUserEntity;

class Manage extends SharedController
{
    
    public function createAction() 
    {
        
        if(!$this->isLoggedIn()) {
            return $this->redirectToRoute('User_Signup');
        }
        
        return $this->render('UserModule:manage:create.html.php', compact('users'));
        
    }
    
    public function listAction()
    {
        
        if(!$this->isLoggedIn()) {
            return $this->redirectToRoute('User_Signup');
        }
		
        $users = $this->getUserStorage()->getAllWithLevels();
		
        return $this->render('UserModule:manage:list.html.php', compact('users'));
    }
    
    public function editAction()
    {
        
        if(!$this->isLoggedIn()) {
            return $this->redirectToRoute('User_Signup');
        }
        
        $userID = $this->getRouteParam('id');
        
        $us = $this->getUserStorage();
        
        if(!$us->existsByID($userID)) {
            $this->setFlash('error', 'Invalid User ID');
            return $this->redirectToRoute('User_Manage_List');
        }
        
        $user = $this->getUser();
        return $this->render('UserModule:manage:edit.html.php', compact('user'));
        
    }
    
    public function deleteAction()
    {
        
        if(!$this->isLoggedIn()) {
            return 'E_NOT_LOGGED_IN';
        }
        
        $userID = $this->getRouteParam('id');
        
        $this->getUserStorage()->delete(array('id' => $this->getRouteParam('id')));
        $this->getUserActivationStorage()->delete(array('user_id' => $userID));
        return 'OK';
        
    }
    
    public function editsaveAction()
    {

        $missingFields = array();
        $post          = $this->post();
        $requiredKeys  = array('userTitle', 'userFirstName', 'userLastName', 'userEmail');
        $userStorage   = $this->getUserStorage();
        
        // Check if the user is logged in.
        if(!$this->isLoggedIn()) {
            return $this->redirectToRoute('User_Login');
        }
        
        // Check for missing fields, or fields being empty.
        foreach($requiredKeys as $field) {
            if(!isset($post[$field]) || empty($post[$field])) {
                $missingFields[] = $field;
            }
        }
        
        // If any fields were missing, inform the client
        if(!empty($missingFields)) {
            $errors[] = 'Missing fields';
            return $this->render('UserModule:account:edit.html.php', compact('errors'));
        }
        
        // If the user has changed their email address from their current one
        if($post['userEmail'] !== $this->getUser()->getEmail()) {
            
            // If the new email is already taken by another user, set an error
            if($userStorage->existsByEmail($post['email'])) {
                $errors[] = 'The email address you have changed to already exists by another user';
                return $this->render('UserModule:account:edit.html.php', compact('errors'));
            }

        }
        
        // Prepare user array for insertion
        $userStorage->update(
            array(
                'title'           => $post['userTitle'],
                'email'           => $post['userEmail'],
                'firstname'       => $post['userFirstName'],
                'lastname'        => $post['userLastName']
            ),
            array('id' => $this->getUser()->getID())
        );
        
        // Update the user objectin th session
        $this->setAuthData(new AuthUserEntity($userStorage->findByID($this->getUser()->getID())));
        
        // Successful \o/
        $this->setFlash('success', 'User Account updated!');
        $this->redirectToRoute('User_Manage_List');
        
    }
    
    public function createsaveAction()
    {
        
        // Check if the user is logged in.
        if(!$this->isLoggedIn()) {
            return $this->redirectToRoute('User_Login');
        }
        
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
            return $this->render('UserModule:manage:create.html.php', compact('errors'));
        }
        
        // Check if the user's passwords do not match
        if($post['userPassword'] !== $post['userConfirmPassword']) {
            $errors[] = 'Passwords do not match';
            return $this->render('UserModule:manage:create.html.php', compact('errors'));
        }
        
        // Check if the user's email address already exists
        if($userStorage->existsByEmail($post['userEmail'])) {
            $errors[] = 'That email address already exists';
            return $this->render('UserModule:manage:create.html.php', compact('errors'));
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
            'used'    => 1,
            'token'   => $activationCode
        ));
        
        // Successful registration. \o/
        $this->setFlash('success', 'User created');
        return $this->redirectToRoute('User_Manage_List');
        
    }
    
}