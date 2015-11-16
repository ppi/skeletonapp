<?php
$config =  array();

$config['modules'] = array(
    'active_modules' => array(
        'Framework',
        'Application',
<<<<<<< HEAD
        'UserModule',
        'BlogModule',
=======
        'HelloModule'
>>>>>>> Cleaning up config files.
    ),
    'module_listener_options' => array(
        'cache_dir'                => '%app.cache_dir%',
        'config_cache_enabled'     => false,
        'config_cache_key'         => '%app.name%',
        'module_map_cache_enabled' => false,
        'module_map_cache_key'     => '%app.name%',
        'module_paths'      => array(
            './modules',
            './vendor'
        )
    ),
);

$config['framework'] = array(
    'templating' => array(
<<<<<<< HEAD
        'engines'     => array('php'),
=======
        'engines'     => array('php', 'twig'),
>>>>>>> Cleaning up config files.
    ),
    'skeleton_module' => array(
        'path' => './utils/skeleton_module'
    )
);

<<<<<<< HEAD
$config['datasource'] = array(
    'connections' => require __DIR__ . '/datasource.php'
);

=======
>>>>>>> Cleaning up config files.
return $config;
