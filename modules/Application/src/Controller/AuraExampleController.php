<?php
namespace Application\Controller;

use PPI\Framework\Module\Controller as BaseController;
use Psr\Http\Message\RequestInterface;

class AuraExampleController extends BaseController
{
    public function __invoke(RequestInterface $r)
    {
        return $this->render('Application:index:index.html.php');
    }
}
