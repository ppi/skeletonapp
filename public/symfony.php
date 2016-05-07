<?php

if (!file_exists($path = dirname(__DIR__) . '/vendor/autoload.php')) {
    die('Unable to find composer generated file at: ' . $path);
}
$loader = require $path;

use Symfony\Component\Debug\Debug;
Debug::enable();

include __DIR__ . '/../app/SymfonyKernel.php';

$configDir = realpath(__DIR__.'/../app/config/' . $env);

$kernel = new SymfonyKernel($env, $debug);
$kernel->setAppConfigDir($configDir);
$kernel->setAppConfigFile('symfony_config.yml');
$kernel->setBundlesConfigFile($configDir . '/symfony_bundles.yml');

$bundles = $kernel->registerBundles();
$kernel->boot();

return $kernel;