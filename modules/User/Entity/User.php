<?php

namespace User\Entity;

class User {
	
	/**
	 * The User ID
	 * 
	 * @var null|integer
	 */
	protected $_id = null;
	
	/**
	 * The Username
	 * 
	 * @var null|string
	 */
	protected $_username = null;
	
	/**
	 * The First Name
	 * 
	 * @var null|string
	 */
	protected $_firstName = null;
	
	/**
	 * The Last Name
	 * 
	 * @var null|string
	 */
	protected $_lastName = null;
	
	/**
	 * The Email Address
	 * 
	 * @var null|string
	 */
	protected $_email = null;
	
	/**
	 * The Users Salt
	 * 
	 * @var null|integer
	 */
	protected $_salt = null;
	
	/**
	 * Are they an admin
	 * 
	 * @var null|integer
	 */
	protected $_is_admin = null;
	
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
	
	function isAdmin() {
		return $this->_is_admin == 1;
	}
	
	function isEnabled() {
		return $this->_enabled == 1;
	} 
}