<?php

$connections = array();

$connections['main'] = array(

    'library'    => 'doctrine_dbal',
    'fetch_mode' => \PDO::FETCH_ASSOC,

    'driver'     => 'pdo_mysql',
    'hostname'   => 'localhost',
    'database'   => 'ppi2_skeleton',
    'username'   => 'root',
    'password'   => '',

    'charset'    => 'utf8',
    'collation'  => 'utf8_unicode_ci',
    'prefix'     => ''
);

$connections['content'] = array(

    'library'    => 'zend_db',

    'driver'     => 'pdo_mysql',
    'hostname'   => 'localhost',
    'database'   => 'ppi2_skeleton',
    'username'   => 'root',
    'password'   => '',

    'charset'    => 'utf8',
    'collation'  => 'utf8_unicode_ci',
    'prefix'     => ''
);


$connections['products'] = array(
    
    'library'    => 'fuelphp',

    'driver'     => 'mysql',
    'hostname'   => 'localhost',
    'database'   => 'ppi2_skeleton',
    'username'   => 'root',
    'password'   => ''
);

$connections['users'] = array(
    
    'library'    => 'laravel',
    'eloquent'   => true,
    'default'    => true,
    'fetch_mode' => \PDO::FETCH_ASSOC,

    'driver'     => 'mysql',
    'hostname'   => 'localhost',
    'database'   => 'ppi2_skeleton',
    'username'   => 'root',
    'password'   => '',

    'charset'    => 'utf8',
    'collation'  => 'utf8_unicode_ci',
    'prefix'     => ''
);

$connections['sessions'] = array(
    
    'library'    => 'doctrine_mongodb',
    'hostname'   => 'localhost',
    'database'   => 'test'
);

return $connections; // Very important you must return the connections variable from this script
