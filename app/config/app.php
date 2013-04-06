<?php
$config = array(
    'templating'    => array(
        'engines'     => array('php', 'smarty', 'twig'),
        'globals'     => array(
            'ga_tracking' => 'UA-XXXXX-X',
        ),
    ),
    'datasource' => array(
            'connections' => include (__DIR__ . '/datasource.php')
    ),
    'skeleton.module.path'   => './utils/skeleton_module',
);

$config = array_merge($config, require_once 'modules.php');

return $config;