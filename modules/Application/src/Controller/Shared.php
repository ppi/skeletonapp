<?php
namespace Application\Controller;

use PPI\Framework\Module\Controller as BaseController;
use UserModule\Entity\User as UserEntity;
use UserModule\Entity\AuthUser as AuthUserEntity;

class Shared extends BaseController
{

    /**
     * Render a template
     *
     * @param  string $template The template to render
     * @param  array $params The params to pass to the renderer
     * @param  array $options Extra options
     * @return string
     */
    protected function render($template, array $params = array(), array $options = array())
    {
        return parent::render($template, $params, $options);
    }

    /**
     * Add a template global variable
     *
     * @param string $param
     * @param mixed $value
     */
    protected function addTemplateGlobal($param, $value)
    {
        $this->getService('templating')->addGlobal($param, $value);
    }

}
