<?php
namespace App\Helper;

class ViewHelper {
	
	function __construct() {
		
	}
	
	function escape($var) {
		return htmlentities($var, ENT_QUOTES, 'UTF-8');
	}
	
}