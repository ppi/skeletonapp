<?php
namespace App\Entity;

use App\Entity\User as UserEntity;

class Talk {
	
	/**
	 * The Talk ID
	 * 
	 * @var null
	 */
	protected $_id = null;

	/**
	 * The title of the talk
	 * 
	 * @var null
	 */
	protected $_title = null;
	
	/**
	 * The owner ID aka user ID of the talk
	 * 
	 * @var null
	 */
	protected $_owner_id = null;
	
	/**
	 * Get the owner ID's name. This is just a shortcut to save us grabbing the main entity.
	 * 
	 * @var null
	 */
	protected $_owner_name = null;
	
	/**
	 * The Talk Description
	 * 
	 * @var null
	 */
	protected $_abstract = null;
	
	/**
	 * The URL to the slides of the talk
	 * 
	 * @var null
	 */
	protected $_slides_url = null;
	
	/**
	 * The technical level of the talk
	 * 
	 * @var null
	 */
	protected $_level = null;
	
	/**
	 * The time duration of the talk
	 * 
	 * @var null
	 */
	protected $_duration = null;
	
	/**
	 * Remark
	 * 
	 * @var null
	 */
	protected $_remark = null;
	
	/**
	 * Get the talk owner entity object
	 * 
	 * @var null|App\Entity\User
	 */
	protected $_talk_owner = null;


	/**
	 * @param array $data
	 */
	function __construct(array $data) {
		foreach ($data as $key => $value) {
			if (property_exists($this, '_' . $key)) {
				$this->{'_' . $key} = $value;
			}
		}
	}
	
	function getID() {
		return $this->_id;
	}

	/**
	 * @return null
	 */
	function getTitle() {
		return $this->_title;
	}

	/**
	 * @return null
	 */
	function getOwnerID() {
		return $this->_owner_id;
	}
	
	function getOwnerName() {
		return $this->_owner_name;
	}
	
	function setOwnerName($name) {
		$this->_owner_name = $name;
	}
	
	function hasOwnerName() {
		return !empty($this->_owner_name);
	}

	/**
	 * @param Talk\Level $level
	 */
	function setLevel($level) {
		$this->_level = $level;
	}

	/**
	 * @return null
	 */
	function getLevel() {
		return $this->_level;
	}
	
	function hasLevel() {
		return !empty($this->_level);
	}

	/**
	 * @return null
	 */
	function getDuration() {
		return $this->_duration;
	}
	
	function hasDuration() {
		return !empty($this->_duration);
	}
	
	function getAbstract() {
		return $this->_abstract;
	}
	
	function setAbstract($abstract) {
		$this->_abstract = $abstract;
	}
	
	function hasAbstract() {
		return !empty($this->_abstract);
	}

	/**
	 * @param $duration
	 */
	function setDuration($duration) {
		$this->_duration = $duration;
	}
	
	function getSlidesURL() {
		return $this->_slides_url;
	} 
	
	function setSlidesURL($url) {
		$this->_slides_url = $url;
	}
	
	function hasSlidesURL() {
		return !empty($this->_slides_url);
	}
	
	function hasRemark() {
		return !empty($this->_remark);
	}
	
	function getRemark() {
		return $this->_remark;
	}
	
	function setRemark($remark) {
		$this->_remark = $remark;
	}
	
	function getTalkOwner() {
		return $this->_talk_owner;
	}
	
	function setTalkOwner(UserEntity $user) {
		$this->_talk_owner = $user;
	}
	
	function hasTalkOwner() {
		return $this->_talk_owner !== null;
	}
	
}