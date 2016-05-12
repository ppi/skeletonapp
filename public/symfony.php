<?php

if (!file_exists($path = dirname(__DIR__) . '/vendor/autoload.php')) {
    die('Unable to find composer generated file at: ' . $path);
}
$loader = require $path;

use PPI\Framework\Http\SymfonyKernel;
use Doctrine\Common\Annotations\AnnotationRegistry;

AnnotationRegistry::registerLoader(array($loader, 'loadClass'));

$configDir = realpath(__DIR__ . '/../app/config/' . $env . '/symfony/');

$kernel = new SymfonyKernel($env, $debug);
$kernel->setAppConfigDir($configDir);
$kernel->setAppConfigFile('config.yml');
$kernel->setCacheDir(realpath(__DIR__ . '/../app/cache'));
$kernel->setLogDir(realpath(__DIR__ . '/../app/logs'));
$kernel->setBundlesConfigFile(realpath($configDir . '/bundles.yml'));
$kernel->setRootDir(realpath(__DIR__ . '/../app'));

$bundles = $kernel->registerBundles();

$kernel->boot();

return $kernel;