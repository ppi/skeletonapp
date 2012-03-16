<?php
namespace App\Controller;
class Manage extends Application {

	function preDispatch() {
		
		// -- Need to be authed --
		$this->loginCheck();
		
		// -- Permissions --
		if(!$this->getUser()->isAdmin()) {
			$this->setFlash('Permission Denied');
			$this->redirect('');
		}
		
		$this->addCSS('user/talk', 'user/account', 'manage/listing');
		$this->addJS('libs/jquery-validationEngine-en', 'libs/jquery-validationEngine', 'app/manage/form');
	}
	
	function index() {
		$this->redirect('manage/users');
	}
	
	function users() {
		
		$this->loginCheck();
		if(!$this->getUser()->isAdmin()) {
			$this->setFlash('Permission Denied');
			$this->redirect('');
		}
		
		$us = $this->getUserStorage();
		
		$users = $us->getAll();
		
		$subPage = 'users';
		$section = 'users';
		$this->render('manage/index', compact('users', 'subPage', 'errors', 'section'));
	}
	
	function viewuser() {
		
		$userID = $this->get(__FUNCTION__);
		if(empty($userID)) {
			$this->redirect('manage/users');
		}
		
		$this->loginCheck();

		// -- Permissions
		if(!$this->getUser()->isAdmin()) {
			$this->setFlash('Permission Denied');
			$this->redirect('');
		}

		// -- Entity Stuff --
		$user = $this->getUserStorage()->getByID($userID);

		// - Rendering --
		$subPage = 'users/view';
		$section = 'users';
		$this->render('manage/index', compact('user', 'subPage', 'errors', 'section'));
		
	}

	function createuser()
	{
		
		$errors = array();

		if($this->is('post')) {
			$post = $this->post();
			$requiredKeys = array('userName', 'email', 'firstName', 'lastName', 'password');
			
			foreach($requiredKeys as $field) {
				if(!isset($post[$field]) || empty($post[$field])) {
					$errors[$field] = 'Field is required';
				}
			}
			
			if(empty($errors)) {
			
				$user = array(
					
					'firstName'      => $post['firstName'],
					'lastName'       => $post['lastName'],
					'email'          => $post['email'],
					'username'       => $post['userName'],
					'password'  => $post['password'],
					'salt'      => base64_encode(openssl_random_pseudo_bytes(16)),

					'twitter_handle' => $post['twitterHandle'],
					'website'        => $post['website'],
					'job_title'      => $post['jobTitle'],
					'company_name'   => $post['companyName'],
					'bio'            => $post['bio'],
					'country'        => $post['country'],

				);
				
				$userStorage = $this->getUserStorage();
				$newUserID = $userStorage->create($user, $this->getConfig()->auth->salt);
				$this->redirect('manage/users');
			}
		}
		// -- Rendering --
		$subPage = 'users/create';
		$section = 'users';
		$this->render('manage/index', compact('user', 'subPage', 'errors', 'section'));
	}
	
	function edituser() {
		
		// -- Params --
		$userID = $this->get(__FUNCTION__);
		if(empty($userID)) {
			$this->redirect('manage/users');
		}
		
		// -- Save --
		if($this->is('post')) {
			return $this->edituser_save($userID);
		}

		// -- Entity Stuff --
		$us = $this->getUserStorage();
		if(!$us->exists($userID)) {
			$this->redirect('manage/users');
		}
		$user = $us->getByID($userID);

		// -- Rendering --
		$subPage = 'users/edit';
		$section = 'users';
		$this->render('manage/index', compact('user', 'subPage', 'errors', 'section'));
	}
	
	function deleteuser() {
		
		$userID = $this->get(__FUNCTION__);
		$us     = $this->getUserStorage();
		$us->delete(array('id' => $userID));
		$this->setFlash('User Deleted');
		$this->redirect('manage/users');
		
	}
	
	protected function edituser_save($userID) {

		$post = $this->post();
		$requiredKeys = array('userName', 'email', 'firstName', 'lastName');
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
				'username'       => $post['userName'],
				'twitter_handle' => $post['twitterHandle'],
				'website'        => $post['website'],
				'job_title'      => $post['jobTitle'],
				'bio'            => $post['bio'],
				'country'        => $post['country'],
			), array('id' => $userID));
			
			$this->setFlash('User Account Updated');
			$this->redirect('manage/users');
		}
	}

	function content() {
		
		// -- Entity Stuff --
		$allContent = $this->getContentStorage()->getAll();
		
		// -- Render --
		$subPage = $section = 'content';
		$this->render('manage/index', compact('allContent', 'subPage', 'section'));
		
	}

	function createcontent() {
		
		$errors = array();
		if($this->is('post')) {
			
			$post = $this->post();
			$requiredKeys = array('contentTitle', 'contentContent');
			
			foreach($requiredKeys as $field) {
				if(!isset($post[$field]) || empty($post[$field])) {
					$errors[$field] = 'Field is required';
				}
			}

			if(empty($errors)) {
				$contentID = $this->getContentStorage()->create(array(
					'title'   => $post['contentTitle'],
					'content' => $post['contentContent']
				));
				$this->redirect('manage/content/view/' . $contentID);
			}
		}
		
		$allContent         = $this->getContentStorage()->getAll();
		$subPage       = 'content/create';
		$section       = 'content';
		
		$this->addCSS('manage/content');
		$this->render('manage/index', compact('talks', 'subPage', 'section', 'talkDurations'));
		
	}
	
	function editcontent() {
		
		// -- Params --
		$contentID = $this->get(__FUNCTION__);
		if(empty($contentID)) {
			$this->setFlash('Invalid Contnet ID');
			$this->redirect('');
		}
		
		$errors = array();
		if($this->is('post')) {
			
			$post = $this->post();
			$requiredKeys = array('contentTitle', 'contentContent');
			
			foreach($requiredKeys as $field) {
				if(!isset($post[$field]) || empty($post[$field])) {
					$errors[$field] = 'Field is required';
				}
			}

			if(empty($errors)) {
				 $this->getContentStorage()->update(array(
					'title'     => $post['contentTitle'],
					'content'   => $post['contentContent']
				), array('id' => $contentID));
				$this->redirect('manage/content/view/' . $contentID);
			}
		}
		
		$content  = $this->getContentStorage()->getContentFromID($contentID);
		$subPage  = 'content/edit';
		$section  = 'content';
		
		$this->addCSS('manage/content');
		$this->render('manage/index', compact('content', 'subPage', 'section'));
		
	}
	
	function deletecontent() {
		
		// -- Params --
		$contentID = $this->get(__FUNCTION__);
		
		$cs = $this->getContentStorage();

		// -- Get the talk --
		$content = $cs->getContentFromID($contentID);
		
		$cs->delete(array('id' => $content->getID()));
		
		$this->setFlash('Content successfully deleted');
		$this->redirect('manage/content');
		
	}
	
	function viewcontent() {
		
		// -- Params --
		$contentID = $this->get(__FUNCTION__);
		if(empty($contentID)) {
			$this->redirect('');
		}
		
		// -- Talk --
		$cs = $this->getContentStorage();
		$content = $cs->getContentFromID($contentID);
		
		// -- Rendering --
		$subPage  = 'content/view';
		$section  = 'content';
		$this->render('manage/index', compact('content', 'section', 'subPage'));
	}
}
