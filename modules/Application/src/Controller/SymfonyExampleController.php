<?php
namespace Application\Controller;

use PPI\Framework\Module\Controller as BaseController;
use Psr\Http\Message\RequestInterface;

class SymfonyExampleController extends BaseController
{
    public function indexAction(RequestInterface $r)
    {
        return $this->render('Application:index:index.html.php');
    }
}
