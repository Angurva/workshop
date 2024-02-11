<?php declare (strict_types = 1);

namespace Controllers;

use Models\LoginModel;


class LoginController
{

    public function index()
    {

        require(dirname(__DIR__).DIRECTORY_SEPARATOR.'public'.DIRECTORY_SEPARATOR.'pages'.DIRECTORY_SEPARATOR.'connection.php');
    }

    public function login()
    {
        if (isset($_POST['email']) && isset($_POST['password']))
        {
            $result = LoginModel::verify($_POST['email'], $_POST['password']);
            var_dump($result);
            if (is_array($result))
            {
                session_start();
                $_SESSION['id'] = $result['em_id'];
                $_SESSION['prenom'] = $result['em_firstname'];
                $_SESSION['nom'] = $result['em_lastname'];
                $_SESSION['role'] = $result['ro_id'];
                
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
    public function logout()
    {
        session_start();
        session_unset();
        session_destroy();
        header('Location: /');
    }


}