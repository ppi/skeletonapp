<?php
$config = [];

$config['modules'] = [
    'Framework',
    'Application'
];
$config['active_modules'] = $config['modules'];

$config['module_listener_options'] = [
    'cache_dir'                => '%app.cache_dir%',
    'config_cache_enabled'     => false,
    'config_cache_key'         => '%app.name%',
    'module_map_cache_enabled' => false,
    'module_map_cache_key'     => '%app.name%',
    'module_paths'      => [
        './modules',
        './vendor'
    ]
];

$config['framework'] = [
    'secret' => 'dsiufh$%^b5^B&%',
    'templating' => [
        'engines'     => ['php'],
    ],
    'skeleton_module' => [
        'path' => './utils/skeleton_module'
    ]
];

$config['datasource'] = [
    'connections' => require __DIR__ . '/datasource.php'
];
return $config;
