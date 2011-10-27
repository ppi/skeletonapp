<?php
/**
 * Shared Application Controller Class
 * this file is used to create generic controller functions
 * to share accross all of your application Controllers
 */
namespace App\Controller;
abstract class Application extends \PPI\Controller {

	/**
	 * Check if the current logged in user is an admin.
	 *
	 * @return unknown
	 */
	function isAdminLoggedIn() {
		$aAuthData = $this->getAuthData();
		return (isset($aAuthData['role_name'])
			&& ($aAuthData['role_name'] == 'administrator' || $aAuthData['role_name'] == 'developer'));
	}

	/**
	 * Check if the current logged in user is an admin. If not then we redirect to login page.
	 *
	 */
	function adminLoginCheck() {
		if($this->isAdminLoggedIn() === false) {
			$this->setFlashMessage('You must be logged in to view that page.', false);
			$this->loginRedirect();
		}
	}

	/**
	 * Perform a login check, if they're not logged in redirect to the login page.
	 *
	 */
	function loginCheck() {
		if(!$this->isLoggedIn()) {
			$this->loginRedirect();
		}
	}

	/**
	 * Redirect to the login page, saving the return url in the session
	 *
	 */
	function loginRedirect() {
		$this->getSession()->set('\PPI\Login::returnUrl', $this->getFullUrl());
		$this->redirect('user/login');
	}

	/**
	 * Load override for admins to set the new template file for the admin panel
	 *
	 * @param string $template
	 * @param array $options
	 */
	function adminLoad($template, array $options = array()) {
		$this->addStylesheet('invalid', 'admin');
		$this->addJavascript('facebox', 'admin');
		$this->setTemplateFile('admin-template.php');
		$options['isAdminPanel'] = true;
		$this->render($template, $options);
	}

}
