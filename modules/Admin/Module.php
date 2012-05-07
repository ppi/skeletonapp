<?php
namespace Admin;

use PPI\Module\RoutesProviderInterface,
	PPI\Module\Module as BaseModule,
	PPI\Autoload,
	PPI\Module\Service;


class Module extends BaseModule {
	
	protected $_moduleName = 'Admin';
	
	function init($e) {
		Autoload::add(__NAMESPACE__, dirname(__DIR__));
	}
	
	/**
	 * Get the routes for this module
	 * 
	 * @return \Symfony\Component\Routing\RouteCollection
	 */
	function getRoutes() {
		return $this->loadYamlRoutes(__DIR__ . '/config/routes.yml');
	}
	
	/**
	 * Get the configuration for this module
	 * 
	 * @return array
	 */
	function getConfig() {
		return $this->loadYamlConfig(__DIR__ . '/config/config.yml');
	}
	
}