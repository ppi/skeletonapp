<?php
namespace App\Controller;
class Home extends Application {

	function index() {
		
		$this->addCSS('home');
		$this->render('home/index');
	}

}
