<?php

namespace Framework;

use PPI\Framework\Module\AbstractModule;

class Module extends AbstractModule {
	
	protected $name = 'Framework';
	
	/**
	 * Get the routes for this module
	 * 
	 * @return \Symfony\Component\Routing\RouteCollection
	 */
	public function getRoutes()
    {
		return $this->loadYamlRoutes(__DIR__ . '/resources/config/routes.yml');
	}

    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/',
                ),
            ),
        );
    }

}
