<?php
/**
 * This file is part of the PPI Framework.
 *
 * @category    PPI
 * @copyright   Copyright (c) 2011-2014 Paul Dragoonis <paul@ppi.io>
 * @license     http://opensource.org/licenses/mit-license.php MIT
 * @link        http://www.ppi.io
 */

//defined('PPI_ROOT_DIR') || define('PPI_ROOT_DIR', __DIR__);
defined('DS')           || define('DS', DIRECTORY_SEPARATOR);

if (!file_exists($path = dirname(__DIR__) . '/vendor/autoload.php')) {
    die('Unable to find composer generated file at: ' . $path);
}

$loader = require $path;

// Adding PPI autoloader so modules may add themself to the autoload process on-the-fly
PPI\Framework\Autoload::config(array(
    'loader'    => $loader
));
PPI\Framework\Autoload::register();

return $loader;
