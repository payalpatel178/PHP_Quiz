<?php
class Contact extends Controller {
	private $model;

	/**
	 * Initialization of Users
	 * @return void
	 */
	public function __construct(){
		parent::__construct();

		$this->model = new ContactM($this->db);
	}

	/**
	 * Controller for contact page GET method
	 */
	function getContactInfo(){
		$address= $this->faker->address;
		$phone=$this->faker->phoneNumber;
		echo $this->f3->get('twig')->render("Pages/contact.twig",array("address"=>$address,"phone"=>$phone));
	}

	/**
	 * POST Validate and add contact message info to the database 
	 * 
	 * @return void
	 */
	public function addMessage(){

		if ($this->isFieldEmpty( $this->f3->get('POST.name') ) || $this->isFieldEmpty( $this->f3->get('POST.email') ) || $this->isFieldEmpty( $this->f3->get('POST.message') ) ){
			$error_message = "All fields are required";
		} else if ( !filter_var( $_POST['email'], FILTER_VALIDATE_EMAIL)){
			$error_message = "Email is not valid";
		}else{

				$this->model->add( );
				$success_message= "Successfully Message sended";
				$name=$this->f3->get('POST.name');
				//saving info to log file
				$this->logger->write("User has sended a message. [user_name:$name]");
				echo $this->f3->get('twig')->render("Pages/contact.twig", array("success_message"=>$success_message));
				die();
		}

		echo $this->f3->get('twig')->render("Pages/contact.twig", array("error_message"=>$error_message));
	}
	
}
