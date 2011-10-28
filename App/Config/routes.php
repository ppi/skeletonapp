<?php
$routes = array();

// --- DEFAULT SECTION - REMOVE THIS ---
$routes['.*'] = 'general/showdefault';
return;
// --- DEFAULT SECTION - REMOVE THIS ---

$routes['__default__'] = 'home/index';
$routes['__404__'] = 'general/show404';

// About Match
$routes['/about\.html'] = 'general/about';
$routes['/advertising\.html'] = 'general/advertising';
// Page Match
$routes['/:any/:any/(:any)\.html\?id=(:num)'] = 'page/view/$2/$1';
