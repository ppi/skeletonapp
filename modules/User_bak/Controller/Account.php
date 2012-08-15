<?php
namespace User\Controller;

use User\Controller\Shared as SharedController;
use User\Entity\AuthUser as AuthUserEntity;

class Account extends SharedController
{
    
    public function viewAction()
    {
        
        if(!$this->isLoggedIn()) {
            return $this->redirectToRoute('User_Signup');
        }
		
        $user = $this->getUser();
		
        return $this->render('User:account:view.html.php', compact('user'));
    }
    
    public function editAction()
    {
        
        if(!$this->isLoggedIn()) {
            return $this->redirectToRoute('User_Signup');
        }
        
        $user = $this->getUser();
        return $this->render('User:account:edit.html.php', compact('user'));
        
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
            return $this->render('User:account:edit.html.php', compact('errors'));
        }
        
        // If the user has changed their email address from their current one
        if($post['userEmail'] !== $this->getUser()->getEmail()) {
            
            // If the new email is already taken by another user, set an error
            if($userStorage->existsByEmail($post['email'])) {
                $errors[] = 'The email address you have changed to already exists by another user';
                return $this->render('User:account:edit.html.php', compact('errors'));
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
        $this->setFlash('success', 'Account updated!');
        $this->redirectToRoute('User_Account');
        
    }
    
    public function editpasswordAction()
    {
        
        if(!$this->isLoggedIn()) {
            return $this->redirectToRoute('User_Signup');
        }
        
        $user = $this->getUser();
        return $this->render('User:account:editpassword.html.php', compact('user'));
    }
    
    public function editpasswordsaveAction()
    {
        
        $missingFields = array();
        $post          = $this->post();
        $requiredKeys  = array('userPassword', 'userNewPassword', 'userConfirmNewPassword');
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
            $errors[] = 'Missing field';
            return $this->render('User:account:editpassword.html.php', compact('errors'));
        }
        
        // Make sure the new passwords match
        if($post['userNewPassword'] !== $post['userConfirmNewPassword']) {
            $errors[] = 'Your new password and confirm new pasword do not match';
            return $this->render('User:account:editpassword.html.php', compact('errors'));
        }
        
        $user = $this->getUser();
        
        // Check current password is valid
        if(!$userStorage->verifyPassword($user->getSalt(), $this->getConfigSalt(), $user->getEmail(), $post['userPassword'])) {
            $errors[] = 'Your existing password is incorrect';
            return $this->render('User:account:editpassword.html.php', compact('errors'));
        }
        
        // Update user's password
        $userStorage->updatePassword($user->getID(), $user->getSalt(), $this->getConfigSalt(), $post['userNewPassword']);

        // Successful password update \o/
        $this->setFlash('success', 'Your password has been updated');
        $this->redirectToRoute('User_Account');
        
    }
    
}