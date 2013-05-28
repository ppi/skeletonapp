<?php
namespace Application\Controller;

use Application\Controller\Shared as SharedController;
use Illuminate\Database\Capsule\Manager as Capsule;


class Index extends SharedController
{
    public function indexAction()
    {
        // $ds         = $this->getService('datasource');
        // $conn       = $ds->getConnection('users');
        // $db         = $conn->selectDatabase('test');
        // $collection = $db->selectCollection('foo');
        return $this->render('Application:index:index.html.php');
    }
}
