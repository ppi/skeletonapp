<?php
namespace App\Controller;
use \PPI\Core\CoreException;
class User extends \PPI\Controller\User {
	function preDispatch() {
		$this->oSession 	= $this->getSession();
		$this->oForm 		= new \PPI\Model\Form();
		$this->oUser 		= new \App\Model\User();
		$this->authData 	= $this->oSession->getAuthData();
	}

	function index() {
		$this->redirect('user/home');
	}

	function profile() {
		$iUserID = (int) $this->_input->get('id', 0);
		if($iUserID < 1) {
			throw new CoreException('No UserID Found. No profile information to display.');
		}
		// quote your inputs using PPI_Model->quote()
		$aUserInfo = $this->oUser->getList('id = '.$this->oUser->quote($iUserID))->fetch();
		if(empty($aUserInfo)) {
			throw new CoreException('Unable to obtain profile information');
		}
		$aViewVars['aUserInfo'] = $aUserInfo;
		$aViewVars['aLanguages'] = array();
		$this->load('user/profile', $aViewVars);
	}

	function dashboard() {
		$this->load('user/dashboard');
	}

	function home() {

		$this->load('user/home');
	}

	function login() {
		parent::login();
	}

	
	function postLoginRedirect() {
		switch($this->getAuthData(false)->role_name) {
			case 'member':
				$this->redirect('');	
				break;
				
			case 'administrator':
			case 'developer':
				$this->redirect('admin');
				break;
		}
		
	}
	
	
	function register() {
		parent::register();
	}

	function recover() {
		parent::recover();
	}

	function logout() {
		$this->oUser->logout();
		$this->redirect('');
	}



}
