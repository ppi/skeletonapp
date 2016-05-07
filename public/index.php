<?php

ini_set('display_errors', 'on');

// All relative paths start from the main directory, not from /public/
chdir(dirname(__DIR__));

// Decline static file requests back to the PHP built-in webserver
if (php_sapi_name() === 'cli-server' && is_file(__DIR__ . parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH))) {
    return false;
}

// Setup autoloading and include PPI
require_once 'app/init.php';

// Set the environment
$env     = getenv('PPI_ENV') ?: 'dev';
$debug   = getenv('PPI_DEBUG') !== '0'  && $env !== 'prod';

// Create...
$app = new PPI\Framework\App(array(
    'environment'   => $env,
    'debug'         => $debug,
    'rootDir'       => realpath(__DIR__.'/../app'),
));

// ...configure...
$app->loadConfig($app->getEnvironment().'/app.php');
$symfonyKernel = include 'symfony.php';

$app->boot(); // Boot PPI

// Register SymfonyContainer into PPI Container
$sfContainer = $symfonyKernel->getContainer();
$app->getServiceManager()->set('SymfonyContainer', $sfContainer);

// Register Symfony Routes into PPI Chain Router
$sfRouter = $sfContainer->get('router');
$ppiChainRouter = $app->getServiceManager()->get('router');
$ppiChainRouter->add($sfRouter);

// Dispatch PPI System
$app->run();
