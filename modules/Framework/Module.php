<?php
namespace Framework;

use PPI\Module\Module as BaseModule;
use PPI\Autoload;


class Module extends BaseModule {
	
	protected $_moduleName = 'Framework';
	
	function init($e) {
		Autoload::add(__NAMESPACE__, dirname(__DIR__));
	}
	
	/**
	 * Get the routes for this module
	 * 
	 * @return \Symfony\Component\Routing\RouteCollection
	 */
	public function getRoutes() {
		return $this->loadYamlRoutes(__DIR__ . '/resources/config/routes.yml');
	}
	
}