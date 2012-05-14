<?php
$start = microtime(true);
include('PPI/PPI/init.php');

$app = new PPI\App();
$app->moduleConfig = include 'app/modules.config.php';
$app->config = include 'app/app.config.php';

// Do you want twig engine enabled?
//$app->templatingEngine = 'twig';

$app->useDataSource = true;

$app->boot()->dispatch();

$end = microtime(true);
var_dump('Taken: ' . number_format($end - $start, 5));