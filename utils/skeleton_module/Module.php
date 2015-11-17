<?php

namespace [MODULE_NAME];

use PPI\Framework\Module\AbstractModule;

class Module extends AbstractModule
{

    /**
     * Get the routes for this module
     *
     * @return [ROUTING_GETROUTES_RETVAL]
     */
    public function getRoutes()
    {
        return $this->[ROUTING_LOAD_METHOD](__DIR__ . '/resources/routes/[ROUTING_DEF_FILE]');
    }

    /**
     * Get the configuration for this module
     *
     * @return array
     */
    public function getConfig()
    {
        return $this->loadConfig(__DIR__ . '/resources/config/config.php');
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
