<?php

namespace Application\Controller;

use Application\Controller\Shared as SharedController;

class Index extends SharedController
{
    /**
     * @return string
     */
    public function indexAction()
    {
        return $this->render('Application:index:index.html.php');
    }
}
