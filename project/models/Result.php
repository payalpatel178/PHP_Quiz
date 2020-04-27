<?php

class Result extends DB\SQL\Mapper
{

	public function __construct(DB\SQL $db)
	{
		parent::__construct($db, 'tbl_quiz_results');
	}

	/**
	 * add quiz result of that user
	 * @return void
	 */
	public function add($counter)
	{
		$this->userId = $_SESSION['userId'];
		$this->quizNo = 1;
		$this->score = $counter;
		$timestamp = date('Y-m-d H:i:s');
		$this->date = $timestamp;
		$this->save();
	}
}
