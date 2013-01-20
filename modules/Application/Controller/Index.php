<?php
namespace Application\Controller;

use Application\Controller\Shared as SharedController;

class Index extends SharedController
{
    public function indexAction()
    {
        return $this->render('Application:index:index.html.php');
    }

    public function twigAction()
    {
        return $this->render('Application:index:index.html.twig');
    }

    public function smartyAction()
    {
        return $this->render('Application:index:index.html.smarty');
    }

    public function mustacheAction()
    {
        $name = 'Paul';
        $names = array(
           array('fname' => 'PPI', 'lname' => 'User1'),
           array('fname' => 'PPI', 'lname' => 'User2'),
           array('fname' => 'PPI', 'lname' => 'User3')
        );

        return $this->render('Application:index:index.html.mustache', compact('name', 'names'));
    }

    public function indexWithFlashesAction() {
        $this->setFlash('warning', 'This is your warning, don\'t let the dogs out again !!');
//        $this->setFlash('error', 'This is your error, someone let the dogs out !!');
//        $this->setFlash('success', 'You successfully kept the dogs inside !!');
        return $this->render('Application:index:index.html.php');
    }

}
