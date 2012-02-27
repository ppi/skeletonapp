<?php
namespace User;
use PPI\Module\RoutesProviderInterface,
	PPI\Module\Module as BaseModule,
	PPI\Autoload;

class Module extends BaseModule implements RoutesProviderInterface {
	
	function init($e) {
		Autoload::add(__NAMESPACE__, dirname(__DIR__));
	}
	
	function getRoutes() {
		return $this->loadYamlRoutes(__DIR__ . '/config/routes.yml');
	}
	
	function getConfiguration() {
		return $this->loadYamlConfig(__DIR__ . '/config/config.yml');
	}
	
	function initServices() {
		var_dump(__FUNCTION__); exit;
		$config = $this->getConfig();
		$deps = array(
			'mailerClass' => isset($config['mailerClass']) ? $config['mailerClass'] : 'swift'
		);
		$this->setServices($deps);
	}
	
}