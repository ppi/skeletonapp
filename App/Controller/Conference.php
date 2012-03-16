<?php
namespace App\Controller;
class Conference extends Application {

	function index() {
		$this->render('conference/index');
	}
	
	function create() {
		
		// Lets display the create conference page
		if($this->is('post')) {
			$confDataSource = new \App\Data\Conference();
			$confID         = $confDataSource->create($this->post());
			$this->setFlash('Conference Successfully Created');
			$this->redirect('conference/show/' . $confID);
		}

		$this->render('conference/create');

	}

	function show() {

		$confID         = $this->get('show');
		$confDataSource = new \App\Data\Conference();
		$conf           = $confDataSource->getConfByID($confID);
		$cfpStatus      = $conf->getCfpStatus();
		$pendingTalks   = $conf->getCFPTalks();
		$this->render('conference/show', compact('conf'));
	}
	
}
