<?php
namespace Admin\Controller;

use PPI\Module\Controller as BaseController;

class Index extends BaseController {
	
	function indexAction() {

		$us = $this->getService('UserStorage');
		$msg = $us->test();
		return $this->render('Admin:manage:index.html.php', compact('msg'));
	}
	
}