<?php

namespace Application;

use PPI\Autoload;
use PPI\Module\AbstractModule;

class Module extends AbstractModule
{

    protected $_moduleName = 'Application';

    /**
     * {@inheritdoc}
     */
    public function init($e)
    {
        Autoload::add(__NAMESPACE__, dirname(__DIR__));
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'Application';
    }

    /**
     * Get the routes for this module
     *
     * @return \Symfony\Component\Routing\RouteCollection
     */
    public function getRoutes()
    {
        return $this->loadYamlRoutes(__DIR__ . '/resources/config/routes.yml');
    }

    /**
     * Get the configuration for this module
     *
     * @return array
     */
    public function getConfig()
    {
        return $this->loadConfig('config.yml');
    }
}
