<?php
class Homepage extends Controller {
	/**
	 * Controller for index page GET method
	 */
	function index(){
		echo $this->f3->get('twig')->render("Pages/home.twig");
	}
	
}
