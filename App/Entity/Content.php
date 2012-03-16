<?php
namespace App\Entity;
class Content {
	
	protected $_id = null;
	protected $_title = null;
	protected $_content = null;
	
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
	
	function getTitle() {
		return $this->_title;
	}
	
	function hasTitle() {
		return !empty($this->_title);
	}
	
	function getContent() {
		return $this->_content;
	}
	
	function hasContent() {
		return !empty($this->_title);
	}
	
}