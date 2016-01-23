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
}
