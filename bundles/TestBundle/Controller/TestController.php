<?php

/*
 * This file is part of the NelmioApiDocBundle.
 *
 * (c) Nelmio <hello@nelm.io>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace TestBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;


class TestController extends Controller
{


    /**
     * @ApiDoc(
     *  resource=true,
     *  description="This is a description of your API method",
     *  filters={
     *      {"name"="a-filter", "dataType"="integer"},
     *      {"name"="another-filter", "dataType"="string", "pattern"="(foo|bar) ASC|DESC"}
     *  }
     * )
     */
    public function indexAction()
    {
        return new Response('<h1>Test is working</h1>');
    }

}
