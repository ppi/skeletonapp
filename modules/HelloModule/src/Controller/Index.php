<?php
namespace HelloModule\Controller;

use HelloModule\Controller\Shared as SharedController;
use Psr\Http\Message\RequestInterface;

class Index extends SharedController
{
    public function indexAction(RequestInterface $request)
    {
        return $this->render('HelloModule:index:index.html.twig');
    }
}
