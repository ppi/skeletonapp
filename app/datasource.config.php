<?php

$connections = array();

$connections['main'] = array(
	'type'   => 'pdo_mysql',
	'host'   => 'localhost',
	'dbname' => 'bb_pg',
	'user'   => 'root',
	'pass'   => ''
);

return $connections; // Very important you must return the connections variable from this script