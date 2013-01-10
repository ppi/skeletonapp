<?php
$config = array(
    'environment'            => 'development',
    'templating.engines'     => array('php', 'smarty', 'twig'),
    'skeleton.module.path'   => './utils/skeleton_module',
    'templating.globals'     => array(
        'ga_tracking' => 'UA-XXXXX-X'
    ),
    'datasource.connections' => include (__DIR__ . '/datasource.config.php')
);

// Are we in debug mode ?
if ($config['environment'] !== 'development') {
    $config['debug']     = $config['environment'] === 'development';
    $config['cache_dir'] = __DIR__ . '/cache';
}
return $config; // Very important
