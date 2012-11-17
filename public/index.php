<?php

// All relative paths start from the main directory, not from /public/
chdir(dirname(__DIR__));

// Lets include PPI
include('app/init.php');

// Create our PPI App instance
$app = new PPI\App();

// Configure the application
$app->loadConfig('app.php');
$app->loadConfig('modules.php');

// If you are using the DataSource component, enable this
$app->loadConfig(array('useDataSource' => true));

$app->boot()->dispatch();