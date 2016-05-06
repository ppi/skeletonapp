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

$configLoader = new \PPI\Framework\Config\ConfigLoader(realpath(__DIR__.'/../app/config/dev/')); // @todo - what should this path be?
$configLoader->load('app.php');

//var_dump($configLoader->getLoader()->load('app.php')); exit;
$kernel->registerContainerConfiguration($configLoader->getLoader());
$bundles = $kernel->registerBundles();
$kernel->boot();

var_dump($bundles); exit;