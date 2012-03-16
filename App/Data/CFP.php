<?php
namespace App\Data;

class CFP {
	
	function voteTalk($direction, $talkID, $userID) {
		$voteDataSource = new \App\Data\Vote();
		return $voteDataSource->create($direction, $talkID, $userID);
	}
	
	function commentOnTalk($comment, $talkID, $userID) {
		$created = time();
	}
	
	function commentOnCFP($comment, $userID) {
		$created = time();
	}
	
}