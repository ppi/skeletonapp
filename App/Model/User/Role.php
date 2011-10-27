<?php
namespace App\Model\User;
class Role extends \App\Model\Application {
	
	protected $_table = 'ppi_roles';
	protected $_primary = 'id';
	
	function __construct() {
		parent::__construct($this->_table, $this->_primary);
	}
	
	function getRoleCounts() {
		$oUser = new APP_Model_User();
		$aRoles = $oUser->select()
			->columns('role_id, count(id) as total')
			->from($oUser->getTableName())
			->group('role_id')
			->getList();
		
		$aRetRoles = array();
		foreach($aRoles as $aRole) {
			$aRetRoles[$aRole['role_id']] = $aRole['total'];
		}
		return $aRetRoles;
	}
	
}