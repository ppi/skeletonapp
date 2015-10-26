<?php
namespace Application\Controller;

use Application\Controller\Shared as SharedController;
use Psr\Http\Message\RequestInterface;

class Index extends SharedController
{

    /**
     * @param RequestInterface $request
     * @return string
     */
    public function __invoke(RequestInterface $request)
    {
        return $this->render('Application:index:index.html.php');
    }
}
