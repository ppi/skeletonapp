<?php
namespace User\Controller;

use PPI\Module\Controller as BaseController;

class Manage extends BaseController {
	
	function indexAction() {
		return $this->render('User:manage:index.html.php');
	}
	
	function indextwigAction() {
		return $this->render('User:manage:index.html.twig');
	}
	
	function createAction() {
		$this->redirect($this->generateUrl('Homepage'));
	}
	
}