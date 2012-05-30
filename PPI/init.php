<?php

defined('PPI_VERSION')     || define('PPI_VERSION', '2.0');
defined('DS')              || define('DS', DIRECTORY_SEPARATOR);
defined('PPI_PATH')        || define('PPI_PATH', realpath(__DIR__) . '/vendor/ppi/ppi/');

$composerPath = __DIR__ . '/vendor/autoload.php';
if(!file_exists($composerPath)) {
	die('Unable to find composer generated file at: ' . $composerPath);
}

// Composer generated file include
require 'vendor/autoload.php';

// Adding PPI autoloader so modules may add themself to the autoload process on-the-fly
PPI\Autoload::config(array(
	'loader'    => new \Symfony\Component\ClassLoader\UniversalClassLoader(),
));
PPI\Autoload::register();