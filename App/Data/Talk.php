<?php
namespace App\Data;
use App\Entity\Talk as TalkEntity;
use App\Entity\Content as ContentEntity;
use App\Entity\User as UserEntity;

class Talk extends \PPI\DataSource\ActiveQuery {
	
	protected $_meta = array(
		'conn'      => 'main',
		'table'     => 'talk',
		'primary'   => 'id',
		'fetchmode' => \PDO::FETCH_ASSOC
	);
	
	function create(array $data, ContentEntity $emailTemplate, UserEntity $user, $config) {
		
		$talkID = $this->insert($data);

		// -- Content Preparation --
		$search = array();
		$data['user_name'] = $user->getFullName();
		
		foreach(array('slides_url', 'remark') as $field) {
			if(empty($data[$field])) {
				$data[$field] = 'Not Supplied';
			}
		}
		
		foreach($data as $field => $val) {
			$search['[%' . $field . '%]'] = $val;
		}
		
		$content = str_replace(array_keys($search), array_values($search), $emailTemplate->getContent());

		// -- Send the email --
		$subject = 'New Talk Created';
		$mailer = new \Swift_Mailer(new \Swift_MailTransport());
		$message = \Swift_Message::newInstance($subject, $content)
			->setFrom(array($config['fromEmail'] => $config['fromName']))
			->setTo(array($config['adminEmail'] => $config['adminName']));
		
		$result = $mailer->send($message);
		return $talkID;
	}
	
	/**
	 * Get all the talks
	 * 
	 * @return mixed
	 */
	function getAll() {
		$rows = $this->fetchAll();
		$talks = array();
		foreach($rows as $row) {
			$talks[] = new TalkEntity($row);
		}
		return $talks;
	}
	
	function getByOwnerID($ownerID) {
		$rows =  $this->_conn->createQueryBuilder()
			->select('t.*')
			->from($this->_meta['table'], 't')
			->andWhere('t.owner_id = :ownerID')
			->setParameter(':ownerID', $ownerID)
			->orderBy('t.title', 'ASC')
			->execute()
			->fetchAll($this->_meta['fetchmode']);
		
		$result = array();
		foreach($rows as $row) {
			$result[] = new TalkEntity($row);
		}
		return $result;
	}
	
	function getTalkFromID($talkID) {
		
		$talk = $this->find($talkID);
		if(empty($talk)) {
			throw new \Exception('Talk Not Found');
		}
		
		return new TalkEntity($talk);
	}
	
	function getAllWithSpeakerName() {
		
		$talks = array();
		$rows = $this->_conn->createQueryBuilder()
			->select("t.*, CONCAT(u.firstName, ' ', u.lastName) as owner_name")
			->from($this->_meta['table'], 't')
			->leftJoin('t', 'user', 'u', 't.owner_id = u.id')
			->orderBy('t.id', 'ASC')
			->execute()
			->fetchAll($this->_meta['fetchmode']);
		
		foreach($rows as $row) {
			$talks[] = new TalkEntity($row);
		}
		return $talks;
	}
	
	function remove($talkID) {
		
		// Remove all votes, comments and CFP submissions on this talk
		$voteDataStorage       = new \App\Data\Vote();
		$commentDataStorage    = new \App\Data\Comment();
		$cfpSubmissionsStorage = new \App\Data\Conference\Submission();

		$cfpSubmissionsStorage->deleteByTalkID($talkID);
		
	}
	
}