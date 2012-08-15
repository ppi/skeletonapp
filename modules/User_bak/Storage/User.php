<?php
namespace User\Storage;

use User\Storage\Base as BaseStorage,
    User\Entity\User as UserEntity;

class User extends BaseStorage
{
    protected $_meta = array(
        'conn'    => 'main',
        'table'   => 'user',
        'primary' => 'id',
        'fetchMode' => \PDO::FETCH_ASSOC
    );

    /**
     * Find a user record by its ID
     *
     * @param $userID
     * @return mixed
     */
    public function findByID($userID)
    {
        return $this->find($userID);
    }

    /**
     * Get a user entity by its ID
     *
     * @param $userID
     * @return mixed
     * @throws \Exception
     */
    public function getByID($userID)
    {
        $row = $this->find($userID);
        if ($row === false) {
            throw new \Exception('Unable to obtain user row for id: ' . $userID);
        }

        return new UserEntity($row);

    }

    /**
     * Find a user record by the email
     *
     * @param  string $email
     * @return mixed
     */
    public function findByEmail($email)
    {
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
     * @param  string     $email
     * @return mixed
     * @throws \Exception
     */
    public function getByEmail($email)
    {
        $row = $this->findByEmail($email);

        if ($row === false) {
            throw new \Exception('Unable to find user record by email: ' . $email);
        }

        return new UserEntity($row);

    }

    /**
     * Check if a user record exists by email address
     *
     * @param $email
     * @return bool
     */
    public function existsByEmail($email)
    {
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
     * @param  string $email
     * @return mixed
     */
    public function deleteByEmail($email)
    {
        return $this->delete(array('email' => $email));
    }

    /**
     * Create a user record
     *
     * @param  array $userData
     * @return mixed
     */
    public function create(array $userData, $configSalt)
    {
        
        // Override the plaintext pass with the encrypted one 
        $userData['password'] = $this->saltPass($userData['salt'], $configSalt, $userData['password']);
        
        return $this->insert($userData);
    }
    
    public function updatePassword($userID, $userSalt, $configSalt, $password) {
        $this->update(
            array('password' => $this->saltPass($userSalt, $configSalt, $password)),
            array('id' => $userID)
        ); 
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
            ->from($this->getTableName(), 'u')
            ->andWhere('u.email = :email')
            ->andWhere('u.password = :password')
            ->setParameter(':email', $email)
            ->setParameter(':password', $encPass)
            ->execute()
            ->fetch($this->getFetchMode());
        
        return $row['total'] > 0;
    }

    /**
     * Verify a user by their email and password
     * 
     * @param string $userSalt
     * @param string $configSalt
     * @param string $userEmail
     * @param string $password
     * @return bool
     */
    public function verifyPassword($userSalt, $configSalt, $userEmail, $password)
    {
        
        $encPass = $this->saltPass($userSalt, $configSalt, $password);
        
        $row = $this->_conn->createQueryBuilder()
            ->select('count(id) as total')
            ->from($this->getTableName(), 'u')
            ->andWhere('u.email = :email')
            ->andWhere('u.password = :password')
            ->setParameter(':email', $userEmail)
            ->setParameter(':password', $encPass)
            ->execute()
            ->fetch($this->getFetchMode());
        
        return $row['total'] > 0;
        
    }

    /**
     * Get entity objects from all users rows
     *
     * @return array
     */
    public function getAll()
    {
        $entities = array();
        $rows = $this->fetchAll();
        foreach ($rows as $row) {
            $entities[] = new UserEntity($row);
        }

        return $entities;

    }

}
