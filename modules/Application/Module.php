<?php

namespace Application;

use PPI\Framework\Module\AbstractModule;

class Module extends AbstractModule
{

    /**
     * Get the routes for this module
     *
     */
    public function getRoutes()
    {
        $path = __DIR__ . '/resources/routes/aura.php';
//        $router = $this->loadAuraRoutes($path);
//        return $router;

        $path = __DIR__ . '/resources/routes/symfony.yml';
        return $this->loadYamlRoutes($path);
    }

    /**
     * Get the configuration for this module
     *
     * @return array
     */
    public function getConfig()
    {
        return $this->loadConfig(__DIR__ . '/resources/config/config.yml');
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
