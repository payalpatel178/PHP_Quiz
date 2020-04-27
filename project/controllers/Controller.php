<?php

class Controller
{
	// Parent class for all my controllers

	protected $f3;
	protected $db;
	public $twig_data;
	public function __construct()
	{
		$c_f3 = Base::instance();

		$c_db = new DB\SQL($c_f3->get('dbHost'), $c_f3->get('dbUser'), $c_f3->get('dbPass'));

		$this->f3 = $c_f3;
		$this->db = $c_db;
		//Create a faker instance
		$this->faker = Faker\Factory::create("en_CA");
		// create a log channel
		$this->logger = new Log('logs/users_logger.log');
	}


	/**
	 * Validate if a given variable is empty
	 *
	 * @param [string] $field
	 * @return boolean
	 */
	function isFieldEmpty($field)
	{
		return (!isset($field) || trim($field) == "");
	}
}
