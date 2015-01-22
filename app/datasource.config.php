<?php

$connections = array();

$connections['main'] = array(
    'type'   => 'pdo_mysql', // This can be any pdo driver. i.e: pdo_sqlite
    'host'   => 'mysql',
    'dbname' => 'ppi',
    'user'   => 'root',
    'pass'   => 'ppi'
);

return $connections; // Very important you must return the connections variable from this script
