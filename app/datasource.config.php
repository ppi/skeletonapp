<?php

$connections = array();

$connections['main'] = array(
    'type'   => 'pdo_mysql', // This can be any pdo driver. i.e: pdo_sqlite
    'host'   => 'localhost',
    'dbname' => 'ppi2_skeleton',
    'user'   => 'root',
    'pass'   => ''
);

return $connections; // Very important you must return the connections variable from this script
