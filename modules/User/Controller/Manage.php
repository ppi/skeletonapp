<?php
namespace User\Controller;
use PPI\Module\Controller as BaseController;
class Manage extends BaseController {
	
	function indexAction() {
		return $this->render('User:manage:index.html.php');
	}
	
	function createAction() {
		$content = 'Create Action Is Here';
		return $content;
		
	}
	
}