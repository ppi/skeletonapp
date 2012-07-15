<?php
namespace Framework\Controller;

use PPI\Module\Controller as BaseController;

class Error extends BaseController {

    public function show404Action() {
        return $this->render('Framework:error:404.html.php');
    }
    
}
