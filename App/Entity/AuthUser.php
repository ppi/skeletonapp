<?php
namespace App\Entity;
use App\Entity\User as UserEntity;
class AuthUser extends UserEntity {


	
	/**
	 * @param array $data
	 */
	function __construct(array $data) {
		foreach ($data as $key => $value) {
			if (method_exists($this, 'set' . $key)) {
				$this->{'set' . $key}($value);
			} elseif (property_exists($this, '_' . $key)) {
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
	
	function getEmail() {
		return $this->_email;
	}
	
	function getUsername() {
		return $this->_username;
	}
	
	function getSalt() {
		return $this->_salt;
	}
	
	function isAdmin() {
		return $this->_is_admin == 1;
	}
	
	function canVote() {
		return $this->_can_vote == 1;
	} 
	
}