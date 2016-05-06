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
$env = 'dev';
$debug = true;
$kernel = new SymfonyKernel($env, $debug);

$configLoader = new \PPI\Framework\Config\ConfigLoader(); // @todo - what should this path be?
$kernel->setConfigPath(realpath(__DIR__.'/../app/config/base/'));

$bundles = $kernel->registerBundles();
$kernel->boot();
$router = $kernel->getContainer()->get('router');
var_dump($router); exit;