<?php
$config = array(
	'environment'            => 'development',
	'templating.engine'      => 'php',
	'datasource.connections' => include (__DIR__ . '/datasource.config.php')
);

// Are we in debug mode ?
if($config['environment'] !== 'development') {
	$config['debug']     = $config['environment'] === 'development';
	$config['cache_dir'] = __DIR__ . '/cache';
}
return $config; // Very important