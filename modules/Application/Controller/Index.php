<?php
namespace Application\Controller;

use PPI\Module\Controller as BaseController;

class Index extends BaseController
{
    public function indexAction()
    {
        return $this->render('Application:index:index.html.php');
    }

    public function indextwigAction()
    {
        return $this->render('Application:index:index.html.twig');
    }

    public function createAction()
    {
        if ($this->is('post') && $this->is('ajax')) {
            $us = $this->getUserStorage();
            $post = $this->post();
            $us->insert(array(
                'name'             => $post['name'],
                'email'            => $post['email'],
                'enabled'          => 1,
                'ip_address'       => $this->getIP(),
                'referrer_user_id' => $this->session('referrerUserID')
            ));
        }

        $this->redirect($this->generateUrl('Homepage'));
    }

    protected function getUserStorage()
    {
        return new \User\Storage\User($this->getService('DataSource'));
    }

}
