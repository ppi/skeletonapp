<?php
namespace Application\Controller;

use Application\Controller\Shared as SharedController;


class Index extends SharedController
{
    public function indexAction()
    {
        $ds         = $this->getService('datasource');
        $conn       = $ds->getConnection('content');

        
        return $this->render('Application:index:index.html.php');
    }
}
