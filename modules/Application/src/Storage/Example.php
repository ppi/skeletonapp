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

    /**
     * Get a entity by its ID
     *
     * @param $id
     * @return mixed
     * @throws \Exception
     */
    public function getByID($id)
    {
        $st = $this->ds->createQueryBuilder()
            ->select('*')
            ->from($this->getTableName(), 't')
            ->where('t.id = :id')
            ->setParameter(':id', $id)
            ->execute();

        $row = $st->fetch($this->getFetchMode());

        if ($row === false) {
            throw new \Exception('Unable to obtain row for id: ' . $id);
        }

        return new Entity($row);
    }

    /**
     * Get entity objects from all rows
     *
     * @return array This will return an array of Entity.
     */
    public function getAll()
    {
        $entities = array();

        $st = $this->ds->createQueryBuilder()
            ->select('*')
            ->from($this->getTableName(), 't')
            ->execute();

        $rows = $st->fetchAll($this->getFetchMode());

        foreach ($rows as $row) {
            $entities[] = new Entity($row);
        }

        return $entities;
    }

    /**
     * Search table using search fields and value
     *
     * @param array $fields The fields in the table you want to search.
     * @param string $value The value you want to search for.
     * @param string $filter_type The type of search you want to run.
     * @return array This will return an array of Entity.
     */
    public function search(array $fields, $value, $filter_type = 'search')
    {
        switch ($filter_type) {
            case 'search':
                $entities = array();
                $qb = $this->ds->createQueryBuilder();

                $qb->select('*')
                   ->from($this->getTableName(), 't');

                foreach ($fields as $field) {
                    $qb->orWhere('t.' . $field . ' LIKE :' . $field)
                       ->setParameter(':' . $field, "%" . $value . "%");
                }

                $st   = $qb->execute();
                $rows = $st->fetchAll($this->getFetchMode());

                foreach ($rows as $row) {
                    $entities[] = new Entity($row);
                }

                return $entities;
            break;
            default:
                throw new \Exception('Filter Type not supported!');
                break;
        }
    }
}
