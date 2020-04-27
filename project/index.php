<?php
session_start();

// composer autoload
require "vendor/autoload.php";

// create f3 variable
$f3 = Base::instance();

// TWIG
$loader = new \Twig\Loader\FilesystemLoader('views');
$twig = new \Twig\Environment($loader, ['debug' => true]);
// additional twig setup can be done here with $twig

$twig->addExtension(new \Twig\Extension\DebugExtension());

$isLoggedIn = "";

$f3->config('inc/setup.ini');

if (isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn'] === true) {
	$isLoggedIn = true;
} else {
	$isLoggedIn = false;
}
$twig->addGlobal('isLoggedIn', $isLoggedIn);

$f3->set("twig", $twig);

//HOME PAGE
$f3->route('GET /', 'Homepage->index');

//ABOUT
$f3->route('GET /about', 'About->getInfo');

// Quiz
$f3->route('GET /quiz', 'Quizes->getQuestions');
$f3->route('POST /quiz', 'Quizes->getQuestions');
$f3->route('GET /answers', 'Quizes->getAnswers');

//CONTACT
$f3->route('GET /contact', 'Contact->getContactInfo');
$f3->route("POST	/contact", "Contact->addMessage");

//LOGIN
$f3->route('GET /login', 'Login->getLoginForm');
$f3->route("POST	/login", "Login->validateUser");

//SIGN UP
$f3->route('GET /signup', 'SignUp->getSignupForm');
$f3->route("POST	/signup", "SignUp->addUser");

//LOGOUT
$f3->route('GET /logout', 'Logout->getloggedOut');
$f3->route('POST /logout', 'Login->validateUser');

// ERROR HANDLING
$f3->set(
	'ONERROR',
	function ($f3) {
		if ($f3->get('ERROR.code') == "404") {
			echo $f3->get('twig')->render("Errors/404.twig");
		} else {
			echo $f3->get('ERROR.code') . " - " . $f3->get('ERROR.status') . "<br/>" . $f3->get('ERROR.text');
		}
	}
);
// execute my f3
$f3->run();
