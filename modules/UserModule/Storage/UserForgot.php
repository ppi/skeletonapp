<?php
namespace UserModule\Storage;

use UserModule\Storage\Base as BaseStorage;
use UserModule\Entity\UserForgotToken as UserForgotTokenEntity;

class UserForgot extends BaseStorage
{
    protected $_meta = array(
        'conn'    => 'main',
        'table'   => 'user_forgot_token',
        'primary' => 'id'
    );
    
    public function create(array $insertData) {
        return parent::insert($insertData);
    }

    /**
     * Check if the user has already used their forgot token
     * 
     * @param  string   $token
     * @return boolean
     */
    public function isUserActivatedByToken($token) {
        
        $row = $this->createQueryBuilder()
              ->select('count(id) as total')
              ->from($this->getTableName(), 'uat')
              ->andWhere('uat.token = :token')
              ->setParameter(':token', $token)
              ->andWhere('uat.used = 1') // <-- Check if they have used/activated their token before. 
              ->execute()
              ->fetch($this->getFetchMode());
  
          return $row['total'] > 0;
        
    }
    
    public function getByToken($token) {
        
        $row = $this->createQueryBuilder()
            ->select('uft.*')
            ->from($this->getTableName(), 'uft')
            ->andWhere('uft.token = :token')
            ->setParameter(':token', $token)
            ->execute()
            ->fetch($this->getFetchMode());

        if ($row === false) {
            throw new \Exception('Unable to find user token record from token: ' . $token);
        }

        return new UserForgotTokenEntity($row);
    
    }

    /**
     * Activate the users token record
     * 
     * @param string $token
     */
    public function useToken($token) {
        
        $dateTime = new \DateTime();
        $this->update(
            array(
                'used'      => 1, 
                'date_used' => $dateTime->format("Y-m-d H:i:s")
            ), 
            array('token' => $token)
        );
    }
    
}

