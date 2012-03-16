<?php
namespace App\Entity;
class User {
	
	/**
	 * The User ID
	 * 
	 * @var null
	 */
	protected $_id = null;
	
	/**
	 * The Username
	 * 
	 * @var null
	 */
	protected $_username = null;
	
	/**
	 * The First Name
	 * 
	 * @var null
	 */
	protected $_firstName = null;
	
	/**
	 * The Last Name
	 * 
	 * @var null
	 */
	protected $_lastName = null;
	
	/**
	 * The Email Address
	 * 
	 * @var null
	 */
	protected $_email = null;
	
	/**
	 * The Users Salt
	 * 
	 * @var null
	 */
	protected $_salt = null;
	
	/**
	 * Are they an admin
	 * 
	 * @var null
	 */
	protected $_is_admin = null;
	
	/**
	 * Can Vote
	 * 
	 * @var null
	 */
	protected $_can_vote = null;
	
	
	protected $_country = null;
	
	protected $_twitter_handle = null;
	protected $_website = null;
	protected $_job_title = null;
	protected $_bio = null;
	
	protected $_company_name = null;
	
	protected $_enabled = null;
	
	/**
	 * Talks
	 * 
	 * @var array
	 */
	protected $_talks = array();
	
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
	
	function getTalks() {
		return $this->_talks;
	}
	
	function hasTalks() {
		return !empty($this->_talks);
	}
	
	function setTalks($talks) {
		$this->_talks = $talks;
	}
	
	function getTwitterHandle() {
		return $this->_twitter_handle;
	}
	
	function setTwitterHandle($handle) {
		$this->_twitter_handle = $handle;
	}
	
	function hasTwitterHandle() {
		return !empty($this->_twitter_handle);
	}
	
	function getFirstName() {
		return $this->_firstName;
	}
	
	function getLastName() {
		return $this->_lastName;
	}
	
	function getFullName() {
		return $this->getFirstName() . ' ' . $this->getLastName();
	}
	
	function getEmail() {
		return $this->_email;
	}
	
	function getUsername() {
		return $this->_username;
	}
	
	function getWebsite() {
		return $this->_website;
	}
	
	function hasWebsite() {
		return !empty($this->_website);
	}
	
	function getJobTitle() {
		return $this->_job_title;
	}
	
	function hasJobTitle() {
		return !empty($this->_job_title);
	}
	
	function getCompanyName() {
		return $this->_company_name;
	}
	
	function hasCompanyName() {
		return !empty($this->_company_name);
	}
	
	function getBio() {
		return $this->_bio;
	}
	
	function hasBio() {
		return !empty($this->_bio);
	}
	
	function getCountry() {
		return $this->_country;
	}
	
	function hasCountry() {
		return !empty($this->_country);
	}
	
	function isAdmin() {
		return $this->_is_admin == 1;
	}
	
	function isEnabled() {
		return $this->_enabled == 1;
	} 
}