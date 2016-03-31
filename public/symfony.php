<?php

if (!file_exists($path = dirname(__DIR__) . '/vendor/autoload.php')) {
    die('Unable to find composer generated file at: ' . $path);
}
$loader = require $path;

PPI\Framework\Autoload::config(array('loader' => $loader));
PPI\Framework\Autoload::add('Application\\', __DIR__ . '/../modules/Application/src');
PPI\Framework\Autoload::register();

use Symfony\Component\Debug\Debug;
Debug::enable();

//var_dump(PPI\Framework\Autoload::$_options['loader']); exit;
//var_dump(__FILE__, new \Application\Controller\Index()); exit;

include __DIR__ . '/../app/SymfonyKernel.php';
$kernel = new SymfonyKernel();
$configLoader = new \PPI\Framework\Config\ConfigLoader(__DIR__ . '/config'); // @todo - what should this path be?

$kernel->registerContainerConfiguration($configLoader->getLoader());
$bundles = $kernel->registerBundles();

var_dump($bundles); exit;