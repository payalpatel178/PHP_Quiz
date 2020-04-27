<?php
class Logout extends Controller
{

    /**
     * Controller for logout page GET method
     */
    function getloggedOut()
    {
        // start session to have access to SESSION superglobal
        session_start();
        //saving info to log file
        $name = $_SESSION['name'];
        $this->logger->write("User has logged out. [user_name:$name]");

        // remove all existing session data
        session_destroy();
        session_unset();

        // redirect
        echo $this->f3->get('twig')->render("Pages/login.twig", array("isLoggedIn" => false));
    }
}
