<?php
namespace [MODULE_NAME]\Controller;

use [MODULE_NAME]\Controller\Shared as SharedController;

class Index extends SharedController
{
    public function indexAction()
    {
        return $this->render('[MODULE_NAME]:index:index.html.php');
    }
}
