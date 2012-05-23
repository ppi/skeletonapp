<?php
return array(
	'cache_dir'              => __DIR__ . '/cache',
	'templating.engine'      => 'php',
	'datasource.connections' => include (__DIR__ . '/datasource.config.php')
);