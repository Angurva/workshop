<?php declare (strict_types = 1);

namespace Controllers;

use Models\HomeModel;

require_once('../App/functions.php');

class HomeController{



    public function index()
    {

        $services = HomeModel::getAllServices();
        require(dirname(__DIR__).DIRECTORY_SEPARATOR.'public'.DIRECTORY_SEPARATOR.'pages'.DIRECTORY_SEPARATOR.'home.php');

    }

    public function update(): void
    {
        if(isset($_POST['title']) &&  $_POST['description'])
        {
            $title = sanitizeString($_POST['title']);
            $description = \sanitizeString($_POST['description']);
            HomeModel:: update($title, $description);
            header('Location: /');
        }
        else{
            die();
        }
       
    }
  
}