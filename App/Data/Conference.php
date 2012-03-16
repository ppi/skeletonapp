<?php
namespace App\Data;
use App\Entity\Conference as ConferenceEntity;
class Conference extends \PPI\DataSource\ActiveQuery {
	
	protected $_meta = array(
		'conn'    => 'main',
		'table'   => 'conference',
		'primary' => 'id'
	);
	
	function create(array $options = array()) {
		
		if(!isset($options['title'], $options['description'], $options['start_date'], 
				$options['end_date'], $options['cfp_start_date'], $options['cfp_end_date'])) {
			throw new \PPI\Core\CoreException('Invalid Argument: Unable to create Conference');
		}
		
		return $this->insert($options);
		
	}
	
	function getConfByID($confID) {
		
		$row = $this->find($confID);
		if(!empty($row)) {
			return new ConferenceEntity($row);
		}
		throw new \PPI\Core\CoreException('Unable to obtain Conference Data');
	}
	
	
	function removeSubmissions($confID) {
		$submissionStorage = new \App\Data\Conference\Submission();
		$submissionStorage->deleteByConferenceID($confID);
	}
}