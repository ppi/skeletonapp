<?php

// All relative paths start from the main directory, not from /public/
chdir(dirname(__DIR__));

// Lets include PPI
include('PPI/init.php');

// Initialise our PPI App
$app = new PPI\App();
$app->moduleConfig = include 'app/modules.config.php';
$app->config = include 'app/app.config.php';

// Do you want twig engine enabled?
//$app->templatingEngine = 'twig';

// If you are using the DataSource component, enable this
$app->useDataSource = true;

$app->boot()->dispatch();