<?php
namespace App\Data;

use App\Entity\Content as ContentEntity;
class Content extends \PPI\DataSource\ActiveQuery {
	
	protected $_meta = array(
		'conn'      => 'main',
		'table'     => 'content',
		'primary'   => 'id',
		'fetchmode' => \PDO::FETCH_ASSOC
	);

	function create(array $data) {
		return $this->insert($data);
	}	
	
	function getContentByTitle($title) {
		
		if(!$this->existsByTitle($title)) {
			throw new \Exception('Unable to get content for: ' . $title);
		}
		return new ContentEntity($this->findByTitle($title));
	}
	
	function findByTitle($title) {
		return $this->_conn->createQueryBuilder()
			->select('c.*')
			->from($this->_meta['table'], 'c')
			->andWhere('c.title = :title')
			->setParameter(':title', $title)
			->execute()
			->fetch($this->_meta['fetchmode']);
	}
	
	function existsByTitle($title) {
		$row = $this->_conn->createQueryBuilder()
			->select('count(id) as total')
			->from($this->_meta['table'], 'c')
			->andWhere('c.title = :title')
			->setParameter(':title', $title)
			->execute()
			->fetch($this->_meta['fetchmode']);
		
		return $row['total'] > 0;
	}
	
	function existsByID($id) {
		$row = $this->_conn->createQueryBuilder()
			->select('count(id) as total')
			->from($this->_meta['table'], 'c')
			->andWhere('c.id = :id')
			->setParameter(':id', $id)
			->execute()
			->fetch($this->_meta['fetchmode']);
		
		return $row['total'] > 0;
	}
	
	function getContentFromID($id) {
		if(!$this->existsByID($id)) {
			throw new \Exception('Unable to get content for ID: ' . $id);
		}
		return new ContentEntity($this->find($id));
	}
	
	function getAll() {
		$content = array();
		$rows = $this->fetchAll();
		foreach($rows as $row) {
			$content[] = new ContentEntity($row);
		}
		return $content;
	}
	
}