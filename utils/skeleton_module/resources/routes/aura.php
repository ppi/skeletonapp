<?php
$router
    ->add('[MODULE_NAME]_Index', '/[MODULE_NAME]/index')
    ->addValues(array(
        'controller' => '[MODULE_NAME]\Controller\Index',
        'action' => 'indexAction'
    ));

return $router;