<?php

// All relative paths start from the main directory, not from /public/
chdir(dirname(__DIR__));

// Lets include PPI
require_once 'app/init.php';

// Create our PPI App instance
$app = new PPI\App('production', false);

// Configure the application
$app->loadConfig('app.yml');

// Load the application, match the URL and send an HTTP response
$app->boot()->dispatch()->send();