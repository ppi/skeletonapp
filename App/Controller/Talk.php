<?php
namespace App\Controller;
class Talk extends Application {
	
	function preDispatch() {
		
		parent::preDispatch();
		
		$this->loginCheck();
		
		$this->addCSS('talk/form', 'user/account');
		$this->addJS('libs/jquery-validationEngine-en', 'libs/jquery-validationEngine', 'app/talk/index');
	}
	
	function index() {
		
	}
	
	function create() {
		
		$errors = array();
		if($this->is('post')) {
			
			$post = $this->post();
			$requiredKeys = array('talkTitle', 'talkDuration', 'talkLevel', 'talkAbstract');
			
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
					$this->getConfig()->email->toArray()
				);
				
				$this->redirect('talk/view/' . $talkID);
			}
		}
		
		$talks             = $this->getTalkStorage()->getByOwnerID($this->getUser()->getID());
		$talkDurations     = $this->getConfig()->talk->duration->toArray();
		$viewingOwnProfile = true;
		$subPage           = 'create';
		$this->render('talk/my', compact('talks', 'viewingOwnProfile', 'subPage', 'talkDurations'));
	}
	
	function view() {
		
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
		
		if($talk->getOwnerID() != $this->getUser()->getID()) {
			$this->setFlash('Permisson Denied');
			$this->redirect('');
		}

		// -- Talk Owner --
		$talkOwner = new \App\Entity\User($this->getUserStorage()->find($talk->getOwnerID()));
		if(empty($talkOwner)) {
			$this->setFlash('Missing Talk Owner');
			$this->redirect('');
		}
		
		// -- Rendering --
		$viewingOwnProfile = $this->isLoggedIn() && $talk->getOwnerID() == $this->getUser()->getID();
		$subPage           = 'view';
		$this->addCSS('talk/view');
		$this->render('talk/my', compact('talkOwner', 'talk', 'viewingOwnProfile', 'subPage'));
		
	}
	
	function edit() {
		
		// -- Params --
		$talkID = $this->get(__FUNCTION__);
		if(empty($talkID)) {
			$this->setFlash('Invalid Talk ID');
			$this->redirect('');
		}

		// -- Need to be authed --
		$this->loginCheck();
		
		$talk = $this->getTalkStorage()->getTalkFromID($talkID);
		if($talk->getOwnerID() != $this->getUser()->getID()) {
			die('permission');
			$this->setFlash('You dont have permissions to edit this talk');
			$this->redirect('');
		}
		
		// -- Save the form --
		if($this->is('post')) {

			$post = $this->post();
			$requiredKeys = array('talkTitle', 'talkDuration', 'talkLevel', 'talkAbstract');
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
					'remark'     => $post['talkRemark'],
					'owner_id'   => $this->getUser()->getID()
				), array('id' => $talk->getID()));
				
				$this->redirect('talk/view/' . $talkID);
			}
		}
		
		// -- Rendering --
		$viewingOwnProfile = true;
		$subPage           = 'edit';
		$talkDurations     = $this->getConfig()->talk->duration->toArray();
		$this->render('talk/my', compact('talk', 'viewingOwnProfile', 'subPage', 'talkDurations'));
		
	}
	
	function delete() {
		
		// -- Params --
		$talkID = $this->get(__FUNCTION__);

		$ts = $this->getTalkStorage();

		// -- Get the talk --
		$talk = $ts->getTalkFromID($talkID);
		
		// Do you haz control?
		if($talk->getOwnerID() != $this->getUser()->getID()) {
			$this->setFlash('Naughty! You don\'t own this talk.');
			$this->redirect('');
		}
		
		$ts->delete(array('id' => $talk->getID()));
		
		$this->setFlash('Talk successfully deleted');
		$this->redirect('my/talks');
		
	}
	
	/**
	 * View all the talks belonging to the current user
	 */
	function my() {
		
		$talks = $this->getTalkStorage()->getByOwnerID($this->getUser()->getID());
		$viewingOwnProfile = true;
		$subPage = 'list';
		$this->render('talk/my', compact('talks', 'viewingOwnProfile', 'subPage'));
	}
	
}
