<?php
namespace User\Controller;

use PPI\Module\Controller as BaseController;
use User\Entity\User as UserEntity;
use User\Entity\AuthUser as AuthUserEntity;

class Shared extends BaseController
{

    /**
     * Get the config options for emailing
     * 
     * @return mixed
     */
    protected function getEmailConfig()
    {
        $config = $this->getConfig();
        return $config['emailConfig'];
    }

    /**
     * Set the user's auth object into the session
     * 
     * @param \User\Entity\AuthUser $data
     */
    protected function setAuthData(AuthUserEntity $data)
    {
        $this->getSession()->set('ppiAuthUser', $data);
    }

    /**
     * Get the user's auth object from the session
     * 
     * @throws \Exception If the auth user object doesn't exist
     */
    protected function getAuthData() {
        $authUser = $this->session('ppiAuthUser');
        if($authUser === null) {
            throw new \Exception('Unable to obtain ppi auth user data');
        }
        return $authUser;
    }
    
    protected function isLoggedIn()
    {
        return $this->getSession()->has('ppiAuthUser');
    }

    /**
     * Get the logged in user object
     */
    protected function getUser()
    {
        return $this->getAuthData();
    }
    
    /**
     * Get the user salt from the config
     * 
     * @return mixed
     */
    protected function getConfigSalt()
    {
        $config = $this->getConfig();
        return $config['authSalt'];
    }

    /**
     * Get the user storage
     * 
     * @return \User\Storage\User
     */
    protected function getUserStorage()
    {
        return new \User\Storage\User($this->getService('DataSource'));
    }

    /**
     * Get the forgot user storage
     * 
     * @return \User\Storage\UserForgot
     */
    protected function getUserForgotStorage()
    {
        return new \User\Storage\UserForgot($this->getService('DataSource'));
    }
    
    /**
     * Get the user activation storage
     * 
     * @return \User\Storage\UserActivation
     */
    protected function getUserActivationStorage()
    {
        return new \User\Storage\UserActivation($this->getService('DataSource'));
    }
    
    /**
     * Render a template
     *
     * @param  string $template The template to render
     * @param  array  $params   The params to pass to the renderer
     * @param  array  $options  Extra options
     * @return string
     */
    protected function render($template, array $params = array(), array $options = array())
    {
        
        $this->addTemplateGlobal('isLoggedIn', $this->isLoggedIn());
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