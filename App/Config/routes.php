<?php
$routes = array();
$routes['__default__'] = 'home/index';
$routes['__404__'] = 'general/show404';

$routes['/account']                 = 'user/showaccount';
$routes['/account/edit']            = 'user/editaccount';
$routes['/account/edit/password']   = 'user/editpassword';
$routes['/account/activate/(:any)'] = 'user/activate/$1';

$routes['/manage/users/create']        = 'manage/createuser';
$routes['/manage/users/edit/(:num)']   = 'manage/edituser/$1';
$routes['/manage/users/view/(:num)']   = 'manage/viewuser/$1';
$routes['/manage/users/delete/(:num)'] = 'manage/deleteuser/$1';

$routes['/manage/tourneys/create']        = 'manage/createtourney';
$routes['/manage/tourneys/edit/(:num)']   = 'manage/edittourney/$1';
$routes['/manage/tourneys/view/(:num)']   = 'manage/viewtourney/$1';
$routes['/manage/tourneys/delete/(:num)'] = 'manage/deletetourney/$1';

$routes['/manage/content/create']        = 'manage/createcontent';
$routes['/manage/content/edit/(:num)']   = 'manage/editcontent/$1';
$routes['/manage/content/view/(:num)']   = 'manage/viewcontent/$1';
$routes['/manage/content/delete/(:num)'] = 'manage/deletecontent/$1';