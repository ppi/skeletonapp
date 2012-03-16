<?php
namespace App\Data\Conference;

class Submission extends \PPI\DataSource\ActiveQuery {
	
	protected $_meta = array(
		'conn'    => 'main',
		'table'   => 'submission',
		'primary' => 'id'
	);
	
	function create() {
		
	}
	
	function remove() {
		
	}
	
	function deleteByConferenceID($confID) {
		
		return $this->delete(array(
			'conf_id' => $confID
		));
		
	}
	
	function deleteByTalkID($talkID) {
		return $this->delete(array(
			'talk_id' => $talkID
		));
	}
	
	
	
}
