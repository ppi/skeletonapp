<?php

if (!file_exists($path = dirname(__DIR__) . '/vendor/autoload.php')) {
    die('Unable to find composer generated file at: ' . $path);
}
$loader = require $path;

use Symfony\Component\Debug\Debug;
Debug::enable();

include __DIR__ . '/../app/SymfonyKernel.php';

$configDir = realpath(__DIR__.'/../app/config/' . $env . '/symfony/');

$kernel = new SymfonyKernel($env, $debug);
$kernel->setAppConfigDir($configDir);
$kernel->setAppConfigFile('config.yml');
$kernel->setBundlesConfigFile($configDir . '/bundles.yml');

$bundles = $kernel->registerBundles();
$kernel->boot();

return $kernel;