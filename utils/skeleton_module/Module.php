<?php
namespace [MODULE_NAME];

use PPI\Module\Module as BaseModule;
use PPI\Autoload;

class Module extends BaseModule
{
    protected $_moduleName = '[MODULE_NAME]';

    public function init($e)
    {
        Autoload::add(__NAMESPACE__, dirname(__DIR__));
    }
    
    /**
     * Get the configuration for this module
     *
     * @return array
     */
    public function getConfig()
    {
        return include(__DIR__ . '/resources/config/config.php');
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
    
//    public function getServiceConfig()
//    {
//        return array('factories' => array(
//            
//        ));
//    }

}
