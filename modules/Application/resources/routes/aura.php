<?php

// add a simple named route without params
$router->add('Homepage', '/')
    ->addValues(array(
        'controller' => 'Application\Controller\Index::indexAction'
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

return $router;