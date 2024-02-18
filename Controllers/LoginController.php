<?php declare (strict_types = 1);

namespace Controllers;

use Models\LoginModel;
use Models\ContactsModel;
use Models\OpinionsModel;

require_once('../App/functions.php');

class LoginController
{

    /** 
     * Method to display login page
     * @param void
     * @return void
    */
    public function index(): void
    {
        require(dirname(__DIR__).DIRECTORY_SEPARATOR.'Views'.DIRECTORY_SEPARATOR.'pages'.DIRECTORY_SEPARATOR.'connection.php');
    }

    /** 
     * method login check if user exist create a session with id, firstname, lastname and role, and redirect to homepage
     * @param void
     * @return void
    */
    public function login(): void
    {
        if (isset($_POST['email']) && isset($_POST['password']))
        {
            $email = \sanitizeString($_POST['email']);
            $password = \sanitizeString($_POST['password']);
            $result = LoginModel::verify($email, $password);
            //var_dump($result);
            if (is_array($result))
            {
                session_start();
                $_SESSION['id'] = $result['em_id'];
                $_SESSION['prenom'] = $result['em_firstname'];
                $_SESSION['nom'] = $result['em_lastname'];
                $_SESSION['role'] = $result['ro_id'];
                $_SESSION['co_pending'] = ContactsModel::pending();
                $_SESSION['op_pending'] = OpinionsModel::pending();
                //require(dirname(__DIR__).DIRECTORY_SEPARATOR.'public'.DIRECTORY_SEPARATOR.'pages'.DIRECTORY_SEPARATOR.'home.php');
                header('Location: /');
            }
            else{
                header('Location: /404');
            }
            
        }
        else{
            header('Location: /connection/login');
        }


    }

    /**
     * method to logout destroy session and all variables SESSION
     * @param void
     * @return void 
     */
    public function logout(): void
    {
        session_start();
        session_unset();
        session_destroy();
        header('Location: /');
    }


}