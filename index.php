<?php
date_default_timezone_set('Europe/London');
require_once '../ppi-framework/PPI/init.php';
$app = new \PPI\App();
$app->boot()->dispatch();
