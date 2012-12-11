<?php
$config = array(
    'environment'            => 'development',
    'templating.engines'     => array('php', 'smarty', 'twig'),
    'templating.globals'     => array('ga_tracking' => 'UA-XXXXX-X'),
    'datasource.connections' => include (__DIR__ . '/datasource.config.php'),
    'skeleton.module.path'   => './utils/skeleton_module'
);

// Are we in debug mode ?
if ($config['environment'] !== 'development') {
    $config['debug']     = $config['environment'] === 'development';
    $config['cache_dir'] = __DIR__ . '/cache';
}
return $config; // Very important
