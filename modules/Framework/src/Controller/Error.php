<?php
namespace Framework\Controller;

use PPI\Framework\Module\Controller as BaseController;

class Error extends BaseController {

    public function show404Action()
    {
        if($this->getEnv() !== 'production') {
            return $this->render('Framework:error:404_dev.html.php');
        } else {
            return $this->render('Framework:error:404.html.php');
        }
    }
    
}
