<?php

use PPI\Framework\Router\LaravelRouter;
use Psr\Http\Message\RequestInterface as R;

/**
 * @var LaravelRouter $router
 */

$router->get('/', [
    'as' => 'Homepage',
    'uses' => 'Application\Controller\LaravelExampleController@index'
]);

$router->get('/hello', function(R $request) {
    return 'HELLO ' . $request->query->get('user');
});

$router->get('/laravel1', function() { return 'HELLO LARAVEL USER'; });



$router->get('/laravel2', 'Application\Controller\LaravelExampleController@index2');
