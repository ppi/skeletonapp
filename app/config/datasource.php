<?php

$connections = array();

$connections['main'] = array(

    'library'    => 'doctrine_dbal',
    'fetch_mode' => \PDO::FETCH_ASSOC,

    'driver'     => 'pdo_mysql',
    'host'       => 'localhost',
    'database'   => 'ppi2_skeleton',
    'username'   => 'root',
    'password'   => '',

    'charset'    => 'utf8',
    'collation'  => 'utf8_unicode_ci',
    'prefix'     => ''
);

$connections['users'] = array(
    
    'library'    => 'laravel',
    'eloquent'   => true,
    'default'    => true,
    'fetch_mode' => \PDO::FETCH_ASSOC,

    'driver'     => 'mysql',
    'host'       => 'localhost',
    'database'   => 'ppi2_skeleton',
    'username'   => 'root',
    'password'   => '',

    'charset'    => 'utf8',
    'collation'  => 'utf8_unicode_ci',
    'prefix'     => ''
);

$connections['users'] = array(
	
    'library'    => 'laravel',
    'fetch_mode' => \PDO::FETCH_ASSOC,

    'driver'     => 'mysql',
    'host'       => 'localhost',
    'database'   => 'ppi2_skeleton',
    'username'   => 'root',
    'password'   => '',

    'charset'    => 'utf8',
    'collation'  => 'utf8_unicode_ci',
    'prefix'     => ''
);

return $connections; // Very important you must return the connections variable from this script
