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
		$app = $this->createApp('dev');
		$request = HttpRequest::create('/');
		$response = HttpResponse::create();

		$response = $app->dispatch($request, $response);

		$this->assertEquals(200, $response->getStatusCode());
	}

	public function testDispatchProd()
	{
		$app = $this->createApp('prod');
		$request = HttpRequest::create('/');
		$response = HttpResponse::create();

		$response = $app->dispatch($request, $response);

		$this->assertEquals(200, $response->getStatusCode());
	}

	private function createApp($env)
	{
		$app = new PPI\Framework\App(array(
			'environment' => $env,
		    'rootDir' => realpath(__DIR__.'/../app'),
		));
		$app->loadConfig($app->getEnvironment() . '/app.php');
		
		return $app;
	}



}
