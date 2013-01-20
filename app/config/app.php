<?php
$config = array(
    'environment'            => 'development',
    'templating.engines'     => array('php', 'smarty', 'twig'),
    'templating.globals'     => array(
        'ga_tracking' => 'UA-XXXXX-X'),
    'datasource.connections' => include (__DIR__ . '/datasource.php'),
    'app.auto_dispatch' => true,
);

// Are we in debug mode ?
if ($config['environment'] !== 'development') {
    $config['debug']     = $config['environment'] === 'development';
    $config['cache_dir'] = __DIR__ . '/cache';
}

return $config; // Very important