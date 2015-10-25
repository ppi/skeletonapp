<?php

// add a simple named route without params
$router->add('Homepage', '/')
    ->addValues(array(
        'controller' => 'Application\Controller\Index'
    ));

return $router;
