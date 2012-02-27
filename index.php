<?php
$start = microtime(true);
include('PPI/PPI/init.php');

$app = new PPI\App();
$app->moduleConfig = include 'app/modules.config.php';

//$app->moduleOptions = array('configGlobPath' => 'app/config/*.config.php');
$app->boot()->dispatch();

$end = microtime(true);
var_dump('Taken: ' . number_format($end - $start, 5));
