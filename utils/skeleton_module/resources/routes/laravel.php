<?php
/** @var \Illuminate\Routing\Router $router */
 $router->get('[MODULE_NAME]/index', [
     'as' => '[MODULE_NAME]_Index',
     'uses' => '[MODULE_NAME]\Controller\Index@indexAction'
 ]);
