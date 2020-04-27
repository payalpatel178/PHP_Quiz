<?php
class About extends Controller {
	/**
	 * Controller for about page GET method
	 */
	function getInfo(){
		echo $this->f3->get('twig')->render("Pages/about.twig");
	}
	
}
