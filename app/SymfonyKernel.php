<?php

use Symfony\Component\HttpKernel\Kernel as BaseKernel;
use Symfony\Component\Config\Loader\LoaderInterface;
use Symfony\Component\Yaml\Yaml;

use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Loader\XmlFileLoader;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\DependencyInjection\Loader\IniFileLoader;
use Symfony\Component\DependencyInjection\Loader\PhpFileLoader;
use Symfony\Component\DependencyInjection\Loader\DirectoryLoader;
use Symfony\Component\DependencyInjection\Loader\ClosureLoader;
use Symfony\Component\HttpKernel\Config\FileLocator;
use Symfony\Component\Config\Loader\LoaderResolver;
use Symfony\Component\Config\Loader\DelegatingLoader;

class SymfonyKernel extends BaseKernel
{

    /**
     * @var 
     */
    private $loader;

    /**
     * @var string
     */
    private $configPath;

    public function setConfigPath($configPath)
    {
        $this->configPath = $configPath;
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
        $loader->load('symfony_config.yml');
    }

    protected function getContainerLoader(ContainerInterface $container)
    {
        $locator = new FileLocator($this, $this->configPath);
        $resolver = new LoaderResolver(array(
            new XmlFileLoader($container, $locator),
            new YamlFileLoader($container, $locator),
            new IniFileLoader($container, $locator),
            new PhpFileLoader($container, $locator),
            new DirectoryLoader($container, $locator),
            new ClosureLoader($container),
        ));

        return new DelegatingLoader($resolver);
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