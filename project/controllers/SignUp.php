<?php
class SignUp extends Controller {

	private $model;

	/**
	 * Initialization of Users
	 * @return void
	 */
	public function __construct(){
		parent::__construct();

		$this->model = new User($this->db);
	}

	/**
	 * Controller for sign up page GET method
	 */
	function getSignupForm(){
		echo $this->f3->get('twig')->render("Pages/signin.twig");
	}
	
	/**
	 * POST Validate and add new user to the database 
	 * 
	 * @return void
	 */
	public function addUser(){

		if ($this->isFieldEmpty( $this->f3->get('POST.name') ) || $this->isFieldEmpty( $this->f3->get('POST.email') ) || $this->isFieldEmpty( $this->f3->get('POST.pword') ) ){
			$error_message = "All fields are required";
		} else if ( !filter_var( $_POST['email'], FILTER_VALIDATE_EMAIL)){
			$error_message = "Email is not valid";
		}else if(strlen($this->f3->get('POST.pword'))<8){
			$error_message = "Password must be atleast 8 characters";
		  }else{
				
				// encrypt the new password
				$password = password_hash( $this->f3->get('POST.pword'), PASSWORD_BCRYPT );

				// adding a "fake" POST element so that we can update the DB
				$this->f3->set('POST.pword', $password);	

				$this->model->add( );
				
				$success_message= "Successfully Signed Up";
				//save info to about new user into log file
				$name=$this->f3->get('POST.name');
				$this->logger->write("New user has signed up. [user_name:$name]");
				$this->f3->reroute("/login");
				die();
		}

		echo $this->f3->get('twig')->render("Pages/signin.twig", array("error_message"=>$error_message));
	}
}
