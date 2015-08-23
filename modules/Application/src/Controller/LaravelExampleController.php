<?php
namespace Application\Controller;

use PPI\Framework\Module\Controller as BaseController;
use Psr\Http\Message\RequestInterface;

class LaravelExampleController extends BaseController
{
    public function index(RequestInterface $r)
    {
        return $this->render('Application:index:index.html.php');
    }

    public function index2(RequestInterface $r) {
        return 'INDEX 2';
    }
}
