<?php

$config = require __DIR__.'/../base/app.php';
$config['modules']['module_listener_options']['config_cache_enabled']     = true;
$config['modules']['module_listener_options']['module_map_cache_enabled'] = true;

return $config;
