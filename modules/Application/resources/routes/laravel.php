<?php

use PPI\Framework\Router\LaravelRouter;

/**
 * @var LaravelRouter $router
 */
$router->get('/', function() { return 'HELLO LARAVEL USER'; });

$router->get('/laravel', ['as' => 'Homepage', 'Application\Controller\Index@index']);