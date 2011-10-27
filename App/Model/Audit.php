<?php
namespace App\Model;
class Audit extends Application {
	
	protected $_table = 'ppi_audit';
	protected $_primary = 'id';
	
	function __construct() {
		parent::__construct($this->_table, $this->_primary);
	}
	
}