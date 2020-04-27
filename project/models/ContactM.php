<?php

class ContactM extends DB\SQL\Mapper
{

	public function __construct(DB\SQL $db)
	{
		parent::__construct($db, 'tbl_contact_info');
	}
	/**
	 * function to send message with user info for contact from our POST superglobal
	 * @return void
	 */
	public function add()
	{
		$this->copyFrom("POST");
		$this->save();
	}
}
