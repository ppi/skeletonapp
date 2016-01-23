<?php

namespace Application\Storage;

class DoctrineDbalBase
{
    protected $ds        = null;
    protected $tableName = null;
    protected $primary   = null;
    protected $fetchMode = null;

    /**
     * Sets up the meta data of the Storage Class
     *
     * @param $ds The datasource
     * @param $tableName The table name
     * @param $primary The primary key of the table
     * @param $fetchMode The fetch mode default: \PDO::FETCH_ASSOC
     */
    public function __construct($ds, $tableName, $primary, $fetchMode = \PDO::FETCH_ASSOC)
    {
        $this->ds        = $ds;
        $this->tableName = $tableName;
        $this->primary   = $primary;
        $this->fetchMode = $fetchMode;
    }

    /**
     * Get the value of DS
     *
     * @return mixed
     */
    public function getDS()
    {
        return $this->ds;
    }

    /**
     * Get the value of Table Name
     *
     * @return mixed
     */
    public function getTableName()
    {
        return $this->tableName;
    }

    /**
     * Get the value of Primary
     *
     * @return mixed
     */
    public function getPrimary()
    {
        return $this->primary;
    }

    /**
     * Get the value of Fetch Mode
     *
     * @return mixed
     */
    public function getFetchMode()
    {
        return $this->fetchMode;
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
        $row = $this->ds->createQueryBuilder()
            ->select('t.*')
            ->from($this->getTableName(), 't')
            ->where('t.id = :id')
            ->setParameter(':id', $id)
            ->execute()
            ->fetch($this->getFetchMode());

        if ($row === false) {
            throw new \Exception('Unable to obtain row for id: ' . $id);
        }

        return new Entity($row);
    }

    /**
     * Delete a row by $id
     *
     * @param  string $id
     * @return mixed
     */
    public function deleteByID($id)
    {
        return $this->ds->delete($this->getTableName(), array($this->getPrimary() => $id));
    }

    /**
     * Insert a record
     *
     * @param  array $data
     * @return mixed
     */
    public function insert(array $data)
    {
        return $this->ds->insert($this->getTableName(), $data);
    }

    /**
     * Update a record
     *
     * @param  array $data
     * @return mixed
     */
    public function update(array $data, $id)
    {
        return $this->ds->update($this->getTableName(), $data, array($this->getPrimary() => $id));
    }

    /**
     * Get entity objects from all users rows
     *
     * @return array This will return an array of Entity.
     */
    public function getAll()
    {
        $entities = array();

        $rows = $this->ds->createQueryBuilder()
            ->select('*')
            ->from($this->getTableName(), 't')
            ->execute()
            ->fetchAll($this->getFetchMode());

        foreach ($rows as $row) {
            $entities[] = new Entity($row);
        }

        return $entities;
    }

    /**
     * Count all the records in table.
     *
     * @return int This will return the count.
     */
    public function countAll()
    {
        $row = $this->ds->createQueryBuilder()
            ->select('count(' . $this->getPrimary() . ') as total')
            ->from($this->getTableName(), 't')
            ->execute()
            ->fetch($this->getFetchMode());

        return $row['total'];
    }

    /**
     * Search table using search fields and value
     *
     * @param array $fields The fields in the table you want to search.
     * @param string $value The value you want to search for.
     * @param string $filter_type The type of search you want to run.
     * @return array This will return an array of Entity.
     */
    public function search($fields, $value, $filter_type = 'search')
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

                $qb->execute();
                $rows = $qb->execute();

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
