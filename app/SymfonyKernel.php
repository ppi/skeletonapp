<?php

use Symfony\Component\HttpKernel\HttpKernel as BaseHttpKernel;
use Symfony\Component\Config\Loader\LoaderInterface;
use Symfony\Component\Yaml\Yaml;

class SymfonyKernel extends BaseHttpKernel
{

    private $loader;

    public function __construct()
    {

    }

    public function registerBundles()
    {
        $env = 'dev';
        $bundlesListPath = __DIR__ . '/config/' . $env . '/symfony_bundles.yml';
        if(!is_readable($bundlesListPath)) {
            throw new \Exception(__METHOD__, __LINE__);
        }

        $config = Yaml::parse($bundlesListPath);

        if(!isset($config['bundles'])) {
            throw new \Exception(__METHOD__, __LINE__);
        }

        $bundlesList = $config['bundles'];

        if(!is_array($bundlesList)) {
            throw new \Exception(__METHOD__, __LINE__);
        }

        $bundles = [];
        foreach($bundlesList as $bundle) {
            if(!class_exists($bundle)) {
                throw new \Exception(__METHOD__, __LINE__);
            }
            $bundles[] = new $bundle;
        }

        return $bundles;
    }

    public function registerContainerConfiguration(LoaderInterface $loader)
    {
        $this->loader = $loader;
    }

    public function getCacheDir()
    {
        return realpath(__DIR__ . '/cache/dev');
    }

    public function getLogDir()
    {
        return realpath(__DIR__ . '/logs');
    }
}