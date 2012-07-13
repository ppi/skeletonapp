<?php

namespace User\Entity;

class User
{
    /**
     * The User ID
     *
     * @var null|integer
     */
    protected $_id = null;

    /**
     * The Username
     *
     * @var null|string
     */
    protected $_username = null;

    /**
     * The First Name
     *
     * @var null|string
     */
    protected $_firstName = null;

    /**
     * The Last Name
     *
     * @var null|string
     */
    protected $_lastName = null;

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
     * Are they an admin
     *
     * @var null|integer
     */
    protected $_is_admin = null;

    /**
     * The user's enabled flag
     *
     * @var null
     */
    protected $_enabled = null;

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

    public function getFirstName()
    {
        return $this->_firstName;
    }

    public function getLastName()
    {
        return $this->_lastName;
    }

    public function getFullName()
    {
        return $this->getFirstName() . ' ' . $this->getLastName();
    }

    public function getEmail()
    {
        return $this->_email;
    }

    public function getUsername()
    {
        return $this->_username;
    }

    public function isAdmin()
    {
        return $this->_is_admin == 1;
    }

    public function isEnabled()
    {
        return $this->_enabled == 1;
    }
}
