<?php
namespace Application\Controller;

use Application\Controller\Shared as SharedController;

class Index extends SharedController
{
    public function indexAction()
    {
        return $this->render('Application:index:index.html.php');
    }

    public function loadAction()
    {
        return $this->indexAction();
    }

    public function __invoke()
    {
        return $this->indexAction();
    }
}
