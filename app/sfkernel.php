<?php

if (!file_exists($path = dirname(__DIR__) . '/vendor/autoload.php')) {
    die('Unable to find composer generated file at: ' . $path);
}
$loader = require $path;

use PPI\Framework\Http\SymfonyKernel;
use Doctrine\Common\Annotations\AnnotationRegistry;

AnnotationRegistry::registerLoader(array($loader, 'loadClass'));

$configDir = realpath(__DIR__ . '/config/' . $env . '/symfony/');

$env = isset($env) ? $env : 'dev';
$debug = isset($debug) ? $debug : true;

$kernel = new SymfonyKernel($env, $debug);
$kernel->setAppConfigDir($configDir);
$kernel->setAppConfigFile('config.yml');
$kernel->setCacheDir(realpath(__DIR__ . '/cache'));
$kernel->setLogDir(realpath(__DIR__ . '/logs'));
$kernel->setBundlesConfigFile(realpath($configDir . '/bundles.yml'));
$kernel->setRootDir(realpath(__DIR__));

$bundles = $kernel->registerBundles();

$kernel->boot();

return $kernel;