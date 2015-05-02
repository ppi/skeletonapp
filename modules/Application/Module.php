<?php

namespace Application;

use PPI\Framework\Module\AbstractModule;

use Aura\Router\RouterFactory as AuraRouterFactory;

use Aura\Router\RouterFactory as AuraRouterFactory;

class Module extends AbstractModule
{

    protected $factory;
    protected $router;

    /**
     * Get the routes for this module
     *
     * @return \Symfony\Component\Routing\RouteCollection
     */
    public function getRoutes()
    {
//        return $this->loadYamlRoutes(__DIR__ . '/resources/config/routes.yml');
        $this->router = $this->newRouter();
        $this->loadAuraRoutes();

        $actual = $this->router->match('/foo');
        var_dump('actual', $actual); exit;
        var_dump($routes); exit;
    }

    protected function newRouterFactory()
    {
        return new AuraRouterFactory();
    }

    protected function newRouter()
    {
        return $this->newRouterFactory()->newInstance();
    }

    public function loadAuraRoutes()
    {
        $this->router->add('before', '/foo');

        $this->router->attach('during', '/during', function ($router) {
            $router->setTokens(array('id' => '\d+'));
            $router->setMethod('GET');
            $router->setValues(array('zim' => 'gir'));
            $router->setSecure(true);
            $router->setWildcard('other');
            $router->setRoutable(false);
            $router->add('bar', '/bar');
        });

        $this->router->add('after', '/baz');

        $routes = $this->router->getRoutes();
        return $routes;

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
