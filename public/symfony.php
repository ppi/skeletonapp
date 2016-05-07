<?php

if (!file_exists($path = dirname(__DIR__) . '/vendor/autoload.php')) {
    die('Unable to find composer generated file at: ' . $path);
}
$loader = require $path;

PPI\Framework\Autoload::config(array('loader' => $loader));
PPI\Framework\Autoload::register();

use Symfony\Component\Debug\Debug;
Debug::enable();

include __DIR__ . '/../app/SymfonyKernel.php';

$env = 'dev'; $debug = true;
$configDir = realpath(__DIR__.'/../app/config/' . $env);

$kernel = new SymfonyKernel($env, $debug);
$kernel->setAppConfigDir($configDir);
$kernel->setAppConfigFile('symfony_config.yml');
$kernel->setBundlesConfigFile($configDir . '/symfony_bundles.yml');

$bundles = $kernel->registerBundles();
$kernel->boot();

return $kernel;