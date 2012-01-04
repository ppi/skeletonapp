<?php
require_once 'PPI/PPI/init.php';
$app = new PPI\App();

// Uncomment to use the PPI\DataSource component
//$app->ds = true;

$app->boot()->dispatch();
