<?php

namespace Application\Entity;

class ExampleEntity
{
    /**
     * @todo Add class variables to match database table fields
     */

    protected $id;

    public function __construct($data = array())
    {
        foreach ($data as $key => $value) {
            if (property_exists($this, $key)) {
                $this->{$key} = $value;
            }
        }
    }

    /**
     * @todo Create getter functions for your class variables
     */

    /**
     * Get Id
     *
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }
}
