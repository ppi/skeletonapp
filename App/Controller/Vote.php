<?php
namespace App\Controller;
class Vote extends Application {

	function index() {
		
		$talks = $this->getTalkStorage()->getAllWithSpeakerName();

		$this->addCSS('jquery-ui/jquery-ui-1.8.17.custom', 'vote/index');
		$this->addJS('libs/jquery-ui-1.8.17.custom.min', 'app/vote/index');
		
		$this->render('vote/index', compact('talks'));
	}

}
