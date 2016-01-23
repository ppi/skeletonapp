<?php
namespace Application\Storage;

use Application\Storage\DoctrineDbalBase as BaseStorage;
use Application\Entity\ExampleEntity as Entity;

class Example extends BaseStorage
{
    public function __construct($ds)
    {
        /**
         * @todo change 'example_table' to your table name
         * @todo change 'id' to primary key of your table
         */
        parent::__construct($ds, 'example_table', 'id');
    }
}
