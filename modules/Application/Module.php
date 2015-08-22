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
        // return $this->getSymfonyRoutes();
       // return $this->getAuraRoutes();
        return $this->getLaravelRoutes();
    }

    public function getAuraRoutes()
    {
        return $this->loadAuraRoutes(__DIR__ . '/resources/routes/aura.php');
    }

    public function getSymfonyRoutes()
    {
        return $this->loadYamlRoutes(__DIR__ . '/resources/routes/symfony.yml');
    }

    public function getLaravelRoutes()
    {
        return $this->loadLaravelRoutes(__DIR__ . '/resources/routes/laravel.php');
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
