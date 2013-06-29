<?php

// All relative paths start from the main directory, not from /public/
chdir(dirname(__DIR__));

// Setup autoloading and include PPI
require_once 'app/init.php';

// Set the environment
$env     = getenv('PPI_ENV') ?: 'dev';
$debug   = getenv('PPI_DEBUG') !== '0'  && $env !== 'prod';

// Create our PPI App instance
$app = new PPI\App(array(
    'environment'   => $env,
    'debug'         => $debug
));

// Configure the application
$app->loadConfig($app->getEnvironment().'/app.yml');

// Load the application, match the URL and send an HTTP response
$app->boot()->dispatch()->send();
