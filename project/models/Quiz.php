<?php

class Quiz extends DB\SQL\Mapper
{

	public function __construct(DB\SQL $db)
	{
		parent::__construct($db, 'tbl_quiz_contents');
	}
	/**
	 * Fetch all the records in our table
	 * "SELECT * FROM tbl_quiz_contents"
	 * @return integer number of records
	 */
	public function fetchAll()
	{
		$this->load();
		return count($this->query);
	}

	/**
	 * Fetch question depends on id
	 * "SELECT * FROM tbl_quiz_contents WHERE id=?"
	 * @return string results
	 */
	public function fetchQuestion($id)
	{
		$this->load(array("id=?", $id));
		$query =  $this->query;
		return $query[0];
	}

	/**
	 * function to get correct answers
	 * @return string results
	 */
	function getCorrectAnswers()
	{
		$this->load();
		return $this->query;
	}
}
