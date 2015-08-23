<?php

// add a simple named route without params
$router->add('Homepage', '/')
    ->addValues(array(
        'controller' => 'Application\Controller\AuraExampleController::indexAction'
    ));

// add a named route with an extended specification
$router->add('blog.read', '/blog/read/{id}{format}')
    ->addTokens(array(
        'id'     => '\d+',
        'format' => '(\.[^/]+)?',
    ))
    ->addValues(array(
        'controller' => 'Application:AuraExampleController:index', // <--- SYNERGY
        'format'     => '.html',
    ));
    
// add a named route with an extended specification - aura will call __invoke()
$router->add('blog.view', '/blog/view/{id}{format}')
    ->addTokens(array(
        'id'     => '\d+',
        'format' => '(\.[^/]+)?',
    ))
    ->addValues(array(
        'controller' => new \Application\Controller\AuraExampleController(),
        'format'     => '.html',
    ));

return $router;
