<?php

/**
 * Class for user authorisation and authentication.
 *
 * @author richard_lovell
 */
class Auth {

    /*
     * Register user. Storing of user data is not implemented.
     */
    public function register() {
        $firstName = filter_var($_POST['first_name'], FILTER_SANITIZE_STRING);
        $lastName = filter_var($_POST['last_name'], FILTER_SANITIZE_STRING);
        $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        echo 'signing up: ' . $firstName . $lastName . $email;
    }

    /*
     * Sign user in.
     */
    public function logIn() {
        //add user's email to session for unique identification
        session_start();
        $_SESSION['user_email'] = filter_var($_POST['email'], FILTER_SANITIZE_STRING);
        echo 'logging in: ' . $_SESSION['user_email'];
    }

    /*
     * Sign user out.
     */
    public function logOut() {
        session_start();
        setcookie(session_name(), '', 100);
        session_unset();
        session_destroy();
        $_SESSION = array();
        echo 'logging out';
    }

}

//controller

$auth = new Auth();
if (isset($_GET['cmd'])) {
    $cmd = filter_var($_GET['cmd'], FILTER_SANITIZE_STRING);
    switch ($cmd) {
        case "login":
            $auth->logIn();
            break;
        case "logout":
            $auth->logOut();
            break;
        case "register":
            $auth->register();
            break;
        default:
            echo "Error - Unauthorised access.";
    }
}
