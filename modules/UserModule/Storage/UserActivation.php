<?php
namespace UserModule\Storage;

use UserModule\Storage\Base as BaseStorage;
use UserModule\Entity\User as UserEntity;

class UserActivation extends BaseStorage
{
    protected $_meta = array(
        'conn'    => 'main',
        'table'   => 'user_activation_token',
        'primary' => 'id'
    );
    
    public function create(array $insertData) {
        return parent::insert($insertData);
    }

    /**
     * Check if the user_id is activated or not
     * 
     * @param $userID
     * @return bool
     */
    public function isActivated($userID) {
        
        $row = $this->createQueryBuilder()
            ->select('count(id) as total')
            ->from($this->getTableName(), 'uat')
            ->andWhere('uat.user_id = :user_id')
            ->setParameter(':user_id', $userID)
            ->andWhere('uat.used = 1') // <-- Check if they have used/activated their token before. 
            ->execute()
            ->fetch($this->getFetchMode());

        return $row['total'] > 0;
        
    }

    /**
     * Check if the user has already been activated by their token.
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

    /**
     * Activate the users token record
     * 
     * @param string $token
     */
    public function activateUser($token) {
        
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

