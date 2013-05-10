<?php

$config = array();

$config['framework'] = array(
    'templating' => array(
        'engines'     => array('php', 'smarty', 'twig'),
        'globals'     => array(
            'ga_tracking' => 'UA-XXXXX-X',
        ),
    ),
    'skeleton_module' => array(
        'path' => './utils/skeleton_module'
    )
);

$config['datasource'] = array(
    'connections' => require __DIR__ . '/datasource.php'
);

$config['modules'] = require __DIR__ . '/modules.php';

return $config;