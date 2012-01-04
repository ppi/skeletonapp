<?php
namespace App\Controller;
class General extends Application {

	function index() { die('index'); }

	function show404() {
		$this->render('framework/404');
	}

	function showdefault() {
		$currentUrl = $this->_request->getUrl();
		echo $this->render('framework/default', compact('currentUrl'), array('partial' => true));
	}

	function about() { die('about'); }

	function advertising() { die('advertising'); }

}
