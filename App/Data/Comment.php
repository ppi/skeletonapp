<?php
namespace App\Data;

/**
 *
 */
class Comment extends \PPI\DataSource\ActiveQuery {
	
	protected $_meta = array(
		'conn'    => 'main',
		'table'   => 'comment',
		'primary' => 'id'
	);

	/**
	 * Create a comment on a talk
	 * 
	 * @param string $comment
	 * @param integer $talkID
	 * @param integer $userID
	 * @return integer
	 */
	function commentOnTalk($comment, $talkID, $userID) {
		$created = time();
		$talk_id = $talkID;
		$user_id = $userID;
		return $this->insert(compact('comment', 'talk_id', 'user_id', 'created'));
	}

	/**
	 * Create a comment on a CFP Process
	 * 
	 * @param string $comment
	 * @param integer $userID
	 * @return integer
	 */
	function commentOnCFP($comment, $userID) {
		$created = time();
		$user_id = $userID;
		return $this->insert(compact('comment', 'talk_id', 'user_id', 'created'));
	}
	
}