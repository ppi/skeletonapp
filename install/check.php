<?php
//error_reporting(E_ALL);
//ini_set('display_errors', 'on');

// @todo we need the user to confirm the path on the box of the ppi-framework.
// @todo with this we can check if files required are there.. this is so we can re-use the default authentication scheme in the project's config
// @todo and can register the user, using this. otherwise we would be registering the user, using some scheme that the dev would change
// @todo to another kind of scheme and it would mismatch
// @todo .. more thinking required ..

$action = isset($_GET['action']) ? $_GET['action'] : null;
switch($action) {

	case 'user_create':
		// Get the default auth scheme from somewhere, (maybe a dropdown, to choose)
		// In order to make a dropdown it would have to scan the PPI/Auth/ folder for schemes
		// Using that auth adapter we can make a user
		break;

	case 'check_php':
		if(checkPHPVersion()) {
			die(json_encode(array('code' => 'E_OK', 'message' => '')));
		} else {
	            die(json_encode(array('code' => 'E_VERSION_TOO_MINOR', 'message' => 'Old PHP version detected; running: ' . PHP_VERSION)));
		}
		break;

	case 'check_pdomysql':
		if(checkPDOMysql()) {
        	    die(json_encode(array('code' => 'E_OK', 'message' => '')));
		}
		else {
		    die(json_encode(array('code' => 'E_EXTENSION_NOT_ENABLED', 'message' => 'PDO &amp; PDO_MySQL not enabled.')));
		}
            
        break;

	case 'check_xml':
		if(checkXML()) {
         		die(json_encode(array('code' => 'E_OK', 'message' => '')));
		}
		else {
		die(json_encode(array('code' => 'E_EXTENSION_NOT_ENABLED', 'message' => 'XML Extension is not enabled.')));
		}
		break;

	case 'check_modrewrite':
		if(checkModRewrite()) {
            die(json_encode(array('code' => 'E_OK', 'message' => '')));
		}
		else {
			die(json_encode(array('code' => 'E_APACHE_MODULE_NOT_ENABLED', 'message' => 'Apache Mod_Rewrite Module is not enabled.')));
		}	
		break;

	case 'check_writeable':
		if(checkWriteable()) {
            die(json_encode(array('code' => 'E_OK', 'message' => '')));
		}
		else {
			die(json_encode(array('code' => 'E_DIRECTORY_PERMISSIONS', 'message' => 'Application directory not writeable')));
		}
		break;

	case 'check_dbconnect':
		$dbInfo = array();
		foreach(array('hostname', 'username', 'password', 'database') as $field) {
			$dbInfo[$field] = isset($_POST[$field]) ? $_POST[$field] : '';
		}
		if(checkDBConnect($dbInfo)) {
	            die(json_encode(array('code' => 'E_OK', 'message' => 'Database connection successfull')));
		}
		else {
		    die(json_encode(array('code' => 'E_DB_CONNECT_FAILED', 'message' => 'Database connection failed.')));
		}
		break;
}

function checkPHPVersion() {
	return version_compare(PHP_VERSION, '5.2.0', '>');
}

function checkPDOMysql() {
    return extension_loaded('PDO') && extension_loaded('pdo_mysql');
}

function checkXML() {
	return function_exists('xml_parser_create');
}

function checkModRewrite() {
	return in_array('mod_rewrite', apache_get_modules());
}

function checkWriteable() {
	return is_writeable('../App/Cache/') && is_writeable('../App/Config/');
}

function checkDBConnect($dbInfo) {
	$link = mysql_connect($dbInfo['hostname'], $dbInfo['username'], $dbInfo['password']);
	if($link === false) {
		return false;
	}
	$ret = mysql_select_db($dbInfo['database'], $link);
	mysql_close($link);
	return $ret;
}

function make_writeable() {
	
}
