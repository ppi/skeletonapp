<?php
namespace User\Storage;

use User\Storage\Base as BaseStorage,
	User\Entity\User as UserEntity;

class User extends BaseStorage {
	
	protected $_meta = array(
		'conn'    => 'main',
		'table'   => 'user',
		'primary' => 'id'
	);
	
	/**
	 * Find a user record by its ID
	 * 
	 * @param $userID
	 * @return mixed
	 */
	public function findByID($userID) {
		return $this->find($userID);
	}
	
	/**
	 * Get a user entity by its ID
	 * 
	 * @param $userID
	 * @return mixed
	 * @throws \Exception
	 */
	public function getByID($userID) {
		
		$row = $this->find($userID);
		if($row === false) {
			throw new \Exception('Unable to obtain user row for id: ' . $userID);
		}
		return UserEntity($row);
		
	}
	
	/**
	 * Find a user record by the email
	 * 
	 * @param string $email
	 * @return mixed
	 */
	public function findByEmail($email) {
		
		return $this->createQueryBuilder()
			->select('u.*')
			->from($this->getTableName(), 'u')
			->andWhere('u.email = :email')->setParameter(':email', $email)
			->execute()
			->fetch($this->getFetchMode());
	}
	
	/**
	 * Get a user entity by the email address
	 * 
	 * @param string $email
	 * @return mixed
	 * @throws \Exception
	 */
	public function getByEmail($email) {
		
		$row = $this->findByEmail($email);
		
		if($row === false) {
			throw new \Exception('Unable to find user record by email: ' . $email);
		}
		
		return UserEntity($row);
		
	}
	
	/**
	 * Check if a user record exists by email address
	 * 
	 * @param $email
	 * @return bool
	 */
	public function existsByEmail($email) {
		
		$row = $this->createQueryBuilder()
			->select('count(id) as total')
			->from($this->getTableName(), 'u')
			->andWhere('u.email = :email')
			->setParameter(':email', $email)
			->execute()
			->fetch($this->getFetchMode());

		return $row['total'] > 0;
	}
	
	/**
	 * Delete a user by their email address
	 * 
	 * @param string $email
	 * @return mixed
	 */
	public function deleteByEmail($email) {
		return $this->delete(array('email' => $email));
	}
	
	/**
	 * Create a user record
	 * 
	 * @param array $userData
	 * @return mixed
	 */
	public function create(array $userData) {
		return $this->insert($userData);
	}
	
	/**
	 * Get entity objects from all users rows
	 * 
	 * @return array
	 */
	public function getAll() {
		
		$entities = array();
		$rows = $this->fetchAll();
		foreach($rows as $row) {
			$entities[] = new UserEntity($row);
		}
		return $entities;
		
	}
	
}