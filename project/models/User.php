<?php

class User extends DB\SQL\Mapper
{

	public function __construct(DB\SQL $db)
	{
		parent::__construct($db, 'tbl_users');
	}
	/**
	 * Create a new user with data from our POST superglobal
	 * @return void
	 */
	public function add()
	{
		$this->copyFrom("POST");
		$this->save();
	}

	/**
	 * function to get password from database depends on email
	 * @return string 
	 */
	function checkPassword($email)
	{
		$this->load(array("email=?", $email));
		$pw = $this->pword;
		return $pw;
	}

	/**
	 * function to get userId from database depends on email
	 * @return integer id of user 
	 */
	function getUserId($email)
	{
		$this->load(array("email=?", $email));
		$userId = $this->id;
		return $userId;
	}

	/**
	 * function to get user name from database depends on email
	 * @return string name of user
	 */
	function getUserName($email)
	{
		$this->load(array("email=?", $email));
		$userName = $this->name;
		return $userName;;
	}
}
