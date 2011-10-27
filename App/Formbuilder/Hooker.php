<?php

// As we extend the shared Controller, we have access to things such as $this->_redirect.
namespace App\Formbuilder;
class Hooker extends \App\Controller\Application {
	private $_formName;
	function __construct() {
		parent::__construct();
	}


	/**
	 * Here you can modify the data as its being brought back from getSubmitValues.
	 * This could be considered as POST-Submit
	 * @param array $formData
	 * @return array
	 */
	function preRetreival($formData) {
		switch($this->_formName) {
			
 			case 'admin_user_addedit':
                unset($formData['password2']);
                break;
                
			case 'user_register':
				// Get the type of user that's being registered.
				unset($formData['password2']);
				break;		
			
		}
		return $formData;
	}
	// You can edit the data here before its been saved to the DB.
	function preSave($formData) {
		return $formData;
	}

	// You can edit the data here after its been saved to the DB
	function postSave($formData) {
		switch ($this->_formName) {
		}
		return $formData;
	}

	/**
	 * You can modify the structure of the whole form structure here. Good for dropdown population
	 * @param array $formStructure The formstructure from setFormStructure()
	 * @return array The updated structure.
	 */
	function structureModify($formStructure) {
		switch ($this->_formName) {
		}
		return $formStructure;
	}

	/**
	 * You can manipulate the data thats in existing fields before it is displayed
	 * @param $formData
	 */
	function dataModify($formData) {
		switch ($this->_formName) {
		}
		return $formData;
	}

	/**
	 * Permissions function to verify things such as authentication checking
	 */
	function permissions() {
		switch ($this->_formName) {
		}
	}

	// Here you prform your own validation prior to the main FB validation.
	// Throwing an exception here will stop the main FB validation from executing.
	function preValidate() {
		switch ($this->_formName) {
		}
	}

	function setFormName($p_sFormName) {
		$this->_formName = $p_sFormName;
	}

	// When the form has been finished and its about to redirect to somewhere, we can do some manipulation.
	// Such as redirect to a custom URL.
	/**
	 * @todo If $oForm->autoSave(); then that function yet to be
	 * made will call finished for an automated finished action;
	 *
	 */
	function finished() {

	}
}