<?php
namespace App\Controller;
class User extends Application {

	function preDispatch() {
		
		$this->addCSS('user/talk', 'user/account');
		$this->addJS('libs/jquery-validationEngine-en', 'libs/jquery-validationEngine', 'app/user/general');
	}
	
	function index() {
		
	}
	
	/**
	 * This is the registration process
	 * 
	 * @return void
	 */
	function signup() {
		
		$errors = array();
		if(!$this->is('post')) {
			return $this->render('user/signup', compact('errors'));
		}
		
		$post = $this->post();
		$requiredKeys = array('email', 'firstName', 'lastName', 'password');
		
		foreach($requiredKeys as $field) {
			if(!isset($post[$field]) || empty($post[$field])) {
				$errors[$field] = 'Field is required';
			}
		}
		
		if(empty($errors)) {
		
			$user = array(
				'email'         => $post['email'],
				'firstName'     => $post['firstName'],
				'lastName'      => $post['lastName'],
				'password'      => $post['password'],
				'enabled'       => 0,
				'salt'          => base64_encode(openssl_random_pseudo_bytes(16)),
				'activate_code' => base64_encode(openssl_random_pseudo_bytes(10))
			);
			
			$config = $this->getConfig();
			
			$userStorage = $this->getUserStorage();
			$newUserID = $userStorage->create(
				$user, 
				$config->auth->salt,
				$this->getContentStorage()->getContentByTitle('user_activate_account'),
				$config->email->toArray()
			);
			
			$this->redirect('user/register_success');
		}
		
		$this->render('user/signup', compact('errors'));
	}
	
	function login() {
		
		// Check if we are already logged in
		if($this->isLoggedIn()) {
			$this->redirect('account');
		}

		$errors = array();
		if(!$this->is('post')) {
			$emailValue = $this->getQuery('email', '');
			return $this->render('user/login', compact('errors', 'emailValue'));
		}

		$post = $this->post();

		$userStorage = $this->getUserStorage();
		if($userStorage->checkAuth($post['email'], $post['password'], $this->getConfig()->auth->salt)) {
			$authUser = new \App\Entity\AuthUser($userStorage->findByEmail($post['email']));
			if(!$authUser->isEnabled()) {
				$errors[] = 'Your account has not been activated. Check your email account';
			}
			if(empty($errors)) {
				$this->setAuthData($authUser);
				$this->redirect('account');
			}
		} else {
			$errors['message'] = 'Login failed. Please try again.';
		}

		$emailValue = $post['email'];
		$this->render('user/login', compact('errors', 'emailValue'));
	}
	
	function activate() {
		$code = $this->get(__FUNCTION__);
		$us = $this->getUserStorage();
		if(!$us->existsByActCode($code)) {
			die('Invalid Activation Code!');
		}
		
		$user = $us->findByActCode($code);
		$us->update(array(
			'enabled'         => 1,
			'activate_code' => '' // Cleanup the act code for improved speed on future act_code lookups
		), array('id' => $user->getID()));
		
		$this->render('user/activate_success', compact('user'));
	}
	
	function register_success() {
		$this->render('user/register_success');
	}
	
	function logout() {
		$this->getSession()->clearAuthData();
		$this->redirect('');
	}
	
	function forgotpw() {
		$this->render('user/forgotpw');
	}
	
	function showaccount() {

		$this->loginCheck();
		
		$viewingOwnProfile = true;
		$userAccount = $this->getUserStorage()->getByEmail($this->getUser()->getEmail());

		// People can't view someone elses profile
		if($this->getUser()->getID() != $userAccount->getID()) {
			$this->setFlash('Permission Denied');
			$this->redirect('');
		}
		
		$subPage = 'showaccount';
		$this->render('user/account', compact('userAccount', 'subPage', 'viewingOwnProfile'));
	}
	
	function editaccount() {
		
		$this->loginCheck();
		if($this->is('post')) {
			
			$post = $this->post();
			$requiredKeys = array('email', 'firstName', 'lastName');
			$errors = array();
			foreach($requiredKeys as $field) {
				if(!isset($post[$field]) || empty($post[$field])) {
					$errors[$field] = 'This field is required';
				}
			}
			if(empty($errors)) {
				
				$this->getUserStorage()->update(array(

					'firstName'      => $post['firstName'],
					'lastName'       => $post['lastName'],
					'email'          => $post['email'],
					'website'        => $post['website'],
					'job_title'      => $post['jobTitle'],
					'company_name'   => $post['companyName'],
					'twitter_handle' => str_replace('@', '', $post['twitterHandle']),
					'bio'            => $post['bio']
				), array('id' => $this->getUser()->getID()));
				
				$this->setFlash('Account Updated');
				$this->redirect('account');
			}
		}
		$userAccount = new \App\Entity\User($this->getUserStorage()->findByEmail($this->getUser()->getEmail()));
		$subPage = 'editaccount';
		$viewingOwnProfile = true;
		$this->render('user/account', compact('userAccount', 'subPage', 'errors', 'viewingOwnProfile'));
	}
	
	function editpassword() {
		
		$this->loginCheck();
		
		$errors = array();
		$post = $this->post();
		if($this->is('post') && isset($post['currentPassword'], $post['password'])) {
			
			$userStorage = $this->getUserStorage();
			$email       = $this->getUser()->getEmail();
			$configSalt  = $this->getConfig()->auth->salt;
			
			// If the existing password is correct.
			if($userStorage->checkAuth($email, $post['currentPassword'], $configSalt)) {
				$userStorage->update(array(
					'password' => $userStorage->saltPass($this->getUser()->getSalt(), $configSalt, $post['password'])
				), array('id' => $this->getUser()->getID()));
				
				$this->setFlash('Password Updated');
				$this->redirect('account');
			} else {
				$errors['currentPassword'] = 'Your current password is incorrect';
			}
		}
		$userAccount = new \App\Entity\User($this->getUserStorage()->findByEmail($this->getUser()->getEmail()));
		$subPage = 'editpassword';
		$viewingOwnProfile = true;
		$this->render('user/account', compact('userAccount', 'subPage', 'errors', 'viewingOwnProfile'));
	}
	
}
