<?php
namespace User\Controller;

use PPI\Module\Controller as BaseController;

class Manage extends BaseController {
	
	function indexAction() {
		die('index');
	}
	
	function createAction() {
		
		$content = 'Create Action Is Here';
		
		return $content;
		
	}
	
}