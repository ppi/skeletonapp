<?php
/**
 * This file is part of the PPI Framework.
 *
 * @copyright  Copyright (c) 2011-2015 Paul Dragoonis <paul@ppi.io>
 * @license    http://opensource.org/licenses/mit-license.php MIT
 *
 * @link       http://www.ppi.io
 */

use PPI\Framework\Http\Request as HttpRequest;
use PPI\Framework\Http\Response as HttpResponse;
use PPI\Framework\App;

/**
 * @author Paul Dragoonis <paul@ppi.io>
 */
class DispatchTest extends \PHPUnit_Framework_TestCase
{

	public function testDispatch()
	{
		// Setup autoloading and include PPI
		require_once realpath(__DIR__ . '/../app/init.php');

		// Create...
		$app = new PPI\Framework\App(array(
			'environment' => 'dev',
		    'rootDir' => realpath(__DIR__.'/../app'),
		));

		$app->loadConfig($app->getEnvironment() . '/app.php');

		$request = HttpRequest::create('/');
		$response = HttpResponse::create();

		$response = $app->dispatch($request, $response);

		$this->assertEquals(200, $response->getStatusCode());
	}

	public function testDispatchProd()
	{
		// Setup autoloading and include PPI
		require_once realpath(__DIR__ . '/../app/init.php');

		// Create...
		$app = new PPI\Framework\App(array(
			'environment' => 'prod',
		    'rootDir' => realpath(__DIR__.'/../app'),
		));

		$app->loadConfig($app->getEnvironment() . '/app.php');

		$request = HttpRequest::create('/');
		$response = HttpResponse::create();

		$response = $app->dispatch($request, $response);

		$this->assertEquals(200, $response->getStatusCode());
	}



}
