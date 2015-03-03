<?php

namespace Application\Storage;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Test extends Eloquent
{

	public $timestamps = false;
	protected $table = 'user_level';


	public function getAll()
	{
		$sql = 'SELECT * FROM user';
		return $this->conn->fetchAll($sql);
	}

	public function getLaravelAll()
	{
		$sql = 'SELECT * FROM user_level';
		var_dump($this->conn->select($sql)); exit;
	}

}
