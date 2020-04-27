<?php
class Login extends Controller
{

	private $model;

	/**
	 * Initialization of Users
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();

		$this->model = new User($this->db);
	}
	/**
	 * Controller for login page GET method
	 */
	function getLoginForm()
	{
		echo $this->f3->get('twig')->render("Pages/login.twig");
	}

	/**
	 * check if valid user or not
	 */
	function validateUser()
	{
		if ($this->isFieldEmpty($this->f3->get('POST.email')) || $this->isFieldEmpty($this->f3->get('POST.pword'))) {
			$error_message = "Both fields are required";
		} else if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
			$error_message = "Email is not valid";
		} else {
			// validate current user
			$email = $this->f3->get('POST.email');
			$password = $this->f3->get('POST.pword');
			//getting password from database
			$pw_db = $this->model->checkPassword($email);

			if (password_verify($password, $pw_db)) {
				$_SESSION['isLoggedIn'] = true;
				$_SESSION['userId'] = $this->model->getUserId($email);
				$_SESSION['name'] = $this->model->getUserName($email);
				$name = $_SESSION['name'];
				//saving info to log file
				$this->logger->write("User has logged in. [user_name:$name]");

				global $isLoggedIn;
				$isLoggedIn = true;
				//redirect
				$this->f3->reroute("/quiz");
				die();
			} else {
				$error_message = "Record does not exists";
				echo $this->f3->get('twig')->render("Pages/login.twig", array("error_message" => $error_message));
				die();
			}
		}

		echo $this->f3->get('twig')->render("Pages/login.twig", array("error_message" => $error_message));
		die();
	}
}
