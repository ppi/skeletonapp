<?php

use Application\Controller\Index as IndexAction;

// add a simple named route without params
$router->add('Homepage', '/');

// add a simple unnamed route with params
//$router->add(null, '/{controller}/{action}/{id}');

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