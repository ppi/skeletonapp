<?php
namespace Application\Controller;

use Application\Controller\Shared as SharedController;

class Index extends SharedController
{
    public function indexAction()
    {
        return $this->render('Application:index:index.html.php');
    }

    public function indextwigAction()
    {
        return $this->render('Application:index:index.html.twig');
    }

    public function indexsmartyAction()
    {
        return $this->render('Application:index:index.html.smarty');
    }
    
    public function indexWithFlashesAction() {
//        $this->setFlash('warning', 'This is your warning, don\'t let the dogs out again !!');
//        $this->setFlash('error', 'This is your error, someone let the dogs out !!');
        return $this->render('Application:index:index.html.php');
    }

    protected function getUserStorage()
    {
        return new \UserModule\Storage\User($this->getService('DataSource'));
    }

}
