<?php

namespace UserModule\Entity;

class UserForgotToken
{
    protected $_id = null;

    protected $_used = null;

    protected $_user_id = null;

    protected $_date_used = null;
    
    protected $_token = null;

    public function __construct(array $data)
    {
        foreach ($data as $key => $value) {
            if (property_exists($this, '_' . $key)) {
                $this->{'_' . $key} = $value;
            }
        }

    }

    public function getID()
    {
        return $this->_id;
    }

    public function getUsed()
    {
        return $this->_used;
    }
    
    public function getUserID()
    {
        return $this->_user_id;
    }

    public function getDateUsed()
    {
        return $this->_date_used;
    }

    public function getToken()
    {
        return $this->_token;
    }

}
