<?php
namespace Application;

use PPI\Framework\Module\AbstractModule;

class Module extends AbstractModule
{

    /**
     * @return array
     */
    public function getConfig()
    {
        return $this->loadConfig(__DIR__ . '/resources/config/config.yml');
    }

    /**
     * @return \Aura\Router\Router
     * @throws \Exception
     */
    public function getRoutes()
    {
        return $this->loadAuraRoutes(__DIR__ . '/resources/routes/aura.php');
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
