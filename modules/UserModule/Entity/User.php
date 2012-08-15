<?php

namespace UserModule\Entity;

class User
{
    /**
     * The User ID
     *
     * @var null|integer
     */
    protected $_id = null;

    /**
     * The user title ('Mr', 'Mrs')
     * 
     * @var null
     */
    protected $_title = null;
    
    /**
     * The First Name
     *
     * @var null|string
     */
    protected $_firstname = null;

    /**
     * The Last Name
     *
     * @var null|string
     */
    protected $_lastname = null;

    /**
     * The Email Address
     *
     * @var null|string
     */
    protected $_email = null;
    
    /**
     * The Users Salt
     *
     * @var null|integer
     */
    protected $_salt = null;

    /**
     * The user's state ID
     * 
     * @var null
     */
    protected $_user_state_id = null;


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
    
    public function getTitle()
    {
        return $this->_title;
    }

    public function getFirstName()
    {
        return $this->_firstname;
    }

    public function getLastName()
    {
        return $this->_lastname;
    }

    public function getFullName()
    {
        return $this->getFirstName() . ' ' . $this->getLastName();
    }

    public function getEmail()
    {
        return $this->_email;
    }
    
    public function getUserState()
    {
        return $this->_user_state_id;
    }
    
    public function getSalt()
    {
        return $this->_salt;
    }

}
