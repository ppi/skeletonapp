<?php
namespace App\Controller;
class Home extends Application {
	
	function preDispatch() {
		
	}

	function index() {
		
		$cs           = $this->getContentStorage();
		$titleContent = $cs->getContentByTitle('home_title');
		$mainContent  = $cs->getContentByTitle('home_content');
		
		$this->addCSS('home');
		$this->render('home/index', compact('titleContent', 'mainContent'));
	}
	
}
