<?php
namespace App\Data;
use App\Entity\User as UserEntity;
class User extends \PPI\DataSource\ActiveQuery {
	
	protected $_meta = array(
		'conn'      => 'main',
		'table'     => 'user',
		'primary'   => 'id',
		'fetchmode' => \PDO::FETCH_ASSOC
	);
	
	/**
	 * Create the user
	 * 
	 * @param array $userData
	 * @param string $configSalt
	 * @return mixed
	 */
	function create(array $userData, $configSalt) {
		
		$encPass = $this->saltPass($userData['salt'], $configSalt, $userData['password']);
		
		// Override the plaintext pass with the encrypted one 
		$userData['password'] = $encPass;
		
		return $this->insert($userData);
	}
	
	/**
	 * Salt the password
	 * 
	 * @param string $userSalt
	 * @param string $configSalt
	 * @param string $pass
	 * @return string
	 */
	function saltPass($userSalt, $configSalt, $pass) {
		return sha1($userSalt . $configSalt . $pass);
	}
	
	/**
	 * Check the authentication fields to make sure things auth properly
	 * 
	 * @param string $email
	 * @param string $password
	 * @param string $configSalt
	 * @return boolean
	 */
	function checkAuth($email, $password, $configSalt) {
		
		$user = $this->findByEmail($email);
		
		if(empty($user)) {
			return false;
		}
		
		
		$encPass = $this->saltPass($user['salt'], $configSalt, $password);
		$row = $this->_conn->createQueryBuilder()
			->select('count(id) as total')
			->from($this->_meta['table'], 'u')
			->andWhere('u.email = :email')
			->andWhere('u.password = :password')
			->setParameter(':email', $email)
			->setParameter(':password', $encPass)
			->execute()
			->fetch($this->_meta['fetchmode']);
		
		return $row['total'] > 0;
	}
	
	/**
	 * Find a user by email
	 * 
	 * @todo Figure out what happens if we pass the result of this, with no rows, Which is bool(false) and into an empty() condition
	 *       
	 * @param string $email
	 * @return mixed
	 */
	function findByEmail($email) {
		return $this->_conn->createQueryBuilder()
			->select('u.*')
			->from($this->_meta['table'], 'u')
			->andWhere('u.email = :email')
			->setParameter(':email', $email)
			->execute()
			->fetch($this->_meta['fetchmode']);
	}
	
	function existsByEmail($email) {
		$row = $this->_conn->createQueryBuilder()
			->select('count(id) as total')
			->from($this->_meta['table'], 'u')
			->andWhere('u.email = :email')
			->setParameter(':email', $email)
			->execute()
			->fetch($this->_meta['fetchmode']);
		
		return $row['total'] > 0;
	}
	
	function findByUsername($username) {
		return $this->_conn->createQueryBuilder()
			->select('u.*')
			->from($this->_meta['table'], 'u')
			->andWhere('u.username = :username')
			->setParameter(':username', $username)
			->execute()
			->fetch($this->_meta['fetchmode']);
	}
	
	function getAll() {
		$rows = $this->fetchAll();
		$users = array();
		foreach($rows as $row) {
			$users[] = new UserEntity($row);
		}
		return $users;
	}
	
	function getByID($userID) {
		return new UserEntity($this->find($userID));
	}
	
	function getByEmail($email) {
		$row = $this->findByEmail($email);
		if($row === false) {
			throw new \Exception('User row by email does not exist');
		}
		return new UserEntity($row);
	}
	
	function exists($userID) {
		$row = $this->find($userID);
		return !empty($row);
	}
	
}