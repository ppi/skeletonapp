<?php
namespace User\Controller;

use PPI\Module\Controller as BaseController;

class Manage extends BaseController {
	
	protected $userStorage;
	
	public function indexAction() {
		return $this->render('User:manage:index.html.php');
	}
	
	public function indextwigAction() {
		return $this->render('User:manage:index.html.twig');
	}
	
	public function createAction() {
		$this->redirect($this->generateUrl('Homepage'));
	}
	
	public function setUserStorage($storage) {
		$this->userStorage = $storage;
	}
	
}