<?php
class Quizes extends Controller
{

	private $model;
	private $answermodel;

	/**
	 * Initialization of quiz
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();

		$this->model = new Quiz($this->db);
		$this->answerModel = new Result($this->db);
	}

	/**
	 * To get questions from database
	 */
	function getQuestions()
	{
		$_POST['counter'] = ((isset($_POST['counter'])) ? $_POST['counter'] : 0);

		if (($this->f3->get('POST.btnNext')) != NULL) {
			$this->getContent($this->f3->get('POST.btnNext'));
		} else {
			$id = 1;
			$this->getContent($id);
		}
	}
	function getContent($id)
	{
		//if not logged in redirect to login page
		if ($_SESSION['userId'] == NULL) {
			$this->f3->reroute("/login");
			die();
		}
		//total number of question
		$total_qn = $this->model->fetchAll();
		$results = $this->model->fetchQuestion($id);
		//counter to keep track number of correct answers
		$counter = $this->f3->get('POST.counter');

		if ($results != NULL) {
			echo $this->f3->get('twig')->render("Quiz/quiz.twig", array("id" => $id, "total_qn" => $total_qn, "results" => $results, "counter" => $counter));
		} else {
			//save info to log file
			$name = $_SESSION['name'];
			$this->logger->write("User has played quiz. [user_name:$name][score:$counter]");

			//save current user result to database
			$this->answerModel->add($counter);
			echo $this->f3->get('twig')->render('Quiz/quiz_result.twig', array("total_qn" => $total_qn, "correct" => $counter));
			die();
		}
	}
	/**
	 * Controller for answers page GET method
	 */
	function getAnswers()
	{
		$answers = $this->model->getCorrectAnswers();
		echo $this->f3->get('twig')->render("Quiz/answers.twig", array("results" => $answers));
	}
}
