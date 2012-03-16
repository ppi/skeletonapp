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

	function talks() {

		// -- Entity Stuff --
		$talks = $this->getTalkStorage()->getAllWithSpeakerName();
		
		$subPage = 'talks';
		$section = 'talks';
		$this->addCSS('manage/talk');
		$this->render('manage/index', compact('talks', 'subPage', 'errors', 'section'));
	}
	
	function createtalk() {
		
		$errors = array();
		if($this->is('post')) {
			
			$post = $this->post();
			$requiredKeys = array('talkTitle', 'talkSlidesUrl', 'talkDuration', 'talkLevel', 'talkAbstract');
			
			foreach($requiredKeys as $field) {
				if(!isset($post[$field]) || empty($post[$field])) {
					$errors[$field] = 'Field is required';
				}
			}

			if(empty($errors)) {
				$talkID = $this->getTalkStorage()->create(array(
						'title'      => $post['talkTitle'],
						'slides_url' => $post['talkSlidesUrl'],
						'duration'   => $post['talkDuration'],
						'level'      => $post['talkLevel'],
						'abstract'   => $post['talkAbstract'],
						'remark'     => $post['talkRemark'],
						'owner_id'   => $this->getUser()->getID()
					),
					$this->getContentStorage()->getContentByTitle('talk_email_template'),
					$this->getUser(),
					$this->getConfig()->email->toArray());
				$this->redirect('manage/talks/view/' . $talkID);
			}
		}
		
		$talks         = $this->getTalkStorage()->getByOwnerID($this->getUser()->getID());
		$subPage       = 'talks/create';
		$section       = 'talks';
		$talkDurations = $this->getConfig()->talk->duration->toArray();
		
		$this->addCSS('manage/talk');
		$this->render('manage/index', compact('talks', 'subPage', 'section', 'talkDurations'));
	}
	
	function viewtalk() {
		
		// -- Params --
		$talkID = $this->get(__FUNCTION__);
		if(empty($talkID)) {
			$this->redirect('');
		}
		
		// -- Talk --
		$talkStorage = $this->getTalkStorage();
		$talk = $talkStorage->find($talkID);
		if(empty($talk)) {
			$this->setFlash('Invalid Talk ID');
			$this->redirect('');
		}
		
		$talk = new \App\Entity\Talk($talk);
		
		// -- Talk Owner --
		$talkOwner = new \App\Entity\User($this->getUserStorage()->find($talk->getOwnerID()));
		if(empty($talkOwner)) {
			$this->setFlash('Missing Talk Owner');
			$this->redirect('');
		}
		
		// -- Rendering --
		$viewingOwnProfile = $this->isLoggedIn() && $talk->getOwnerID() == $this->getUser()->getID();
		$subPage           = 'talks/view';
		$section           = 'talks';
		
		$this->addCSS('talk/view');
		$this->render('manage/index', compact('talkOwner', 'talk', 'section', 'subPage'));
	}
	
	function edittalk() {
		
		// -- Params --
		$talkID = $this->get(__FUNCTION__);
		if(empty($talkID)) {
			$this->setFlash('Invalid Talk ID');
			$this->redirect('');
		}
		
		$talk = $this->getTalkStorage()->getTalkFromID($talkID);
		
		// -- Save the form --
		if($this->is('post')) {

			$post = $this->post();
			$requiredKeys = array('talkTitle', 'talkSlidesUrl', 'talkDuration', 'talkLevel', 'talkAbstract');
			$errors = array();
			foreach($requiredKeys as $field) {
				if(!isset($post[$field]) || empty($post[$field])) {
					$errors[$field] = 'Field is required';
				}
			}
			if(empty($errors)) {
				$this->getTalkStorage()->update(array(
					'title'      => $post['talkTitle'],
					'slides_url' => $post['talkSlidesUrl'],
					'duration'   => $post['talkDuration'],
					'level'      => $post['talkLevel'],
					'abstract'   => $post['talkAbstract'],
					'remark'     => $post['talkRemark']					
				), array('id' => $talk->getID()));

				$this->redirect('manage/talks/view/' . $talkID);
			}
		}
		
		// -- Rendering --
		$section       = 'talks';
		$subPage       = 'talks/edit';
		$talkDurations = $this->getConfig()->talk->duration->toArray();
		
		$this->addCSS('manage/talk');
		$this->render('manage/index', compact('talk', 'section', 'subPage', 'talkDurations'));
		
	}
	
	function deletetalk() {
		
		// -- Params --
		$talkID = $this->get(__FUNCTION__);
		
		$ts = $this->getTalkStorage();

		// -- Get the talk --
		$talk = $ts->getTalkFromID($talkID);
		
		$ts->delete(array('id' => $talk->getID()));
		
		$this->setFlash('Talk successfully deleted');
		$this->redirect('manage/talks');
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
