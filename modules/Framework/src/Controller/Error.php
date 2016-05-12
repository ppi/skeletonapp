<?php
namespace Framework\Controller;

use PPI\Framework\Module\Controller as BaseController;
use Symfony\Component\Intl\Exception\ResourceBundleNotFoundException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;

class Error extends BaseController {

    public function show404Action()
    {
        if($this->getEnv() === 'production') {
            return $this->render('Framework:error:404.html.php');
        } else {
            throw new ResourceNotFoundException('404: Resource not found');
        }
    }
    
}
