<?php

// add a simple named route without params
$router->add('Homepage', '/')
    ->addValues(array(
        'controller' => 'Application\Controller\Index'
    ));

// add a named route with an extended specification
$router->add('blog.read', '/blog/read/{id}{format}')
    ->addTokens(array(
        'id'     => '\d+',
        'format' => '(\.[^/]+)?',
    ))
    ->addValues(array(
        'controller' => 'Application:Index:index',
        'format'     => '.html',
    ));
    
// add a named route with an extended specification
$router->add('blog.view', '/blog/view/{id}{format}')
    ->addTokens(array(
        'id'     => '\d+',
        'format' => '(\.[^/]+)?',
    ))
    ->addValues(array(
        'controller' => new \Application\Controller\Index(),
        'format'     => '.html',
    ));

return $router;
