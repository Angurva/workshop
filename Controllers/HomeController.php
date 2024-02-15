<?php declare (strict_types = 1);

namespace Controllers;

use Models\HomeModel;
use Models\OpinionsModel;
use Models\SchedulersModel;

require_once('../App/functions.php');

class HomeController{

    /**
     * Method view homepage
     * display services and Opinions
     */
    public function index()
    {
        session_start();
        $services = HomeModel::getAllServices();
        $opinions = OpinionsModel::getOpinions();
        $schedulers = SchedulersModel::getScheduler();
        ob_start();        
        require(dirname(__DIR__).DIRECTORY_SEPARATOR.'Views'.DIRECTORY_SEPARATOR.'pages'.DIRECTORY_SEPARATOR.'home.php');
        $pageContent = ob_get_clean();
        
        require(dirname(__DIR__).DIRECTORY_SEPARATOR.'Views'.DIRECTORY_SEPARATOR.'layout.php');

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