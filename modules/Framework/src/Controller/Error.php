<?php
namespace Framework\Controller;

use PPI\Framework\Module\Controller as BaseController;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;

class Error extends BaseController {

    public function show404Action()
    {
        if($this->getEnv() !== 'production') {
            throw new ResourceNotFoundException('Page not found');
        } else {
            return $this->render('Framework:error:404.html.php');
        }
    }
    
}
