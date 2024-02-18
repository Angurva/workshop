<?php declare (strict_types = 1);

namespace Controllers;

use Models\HomeModel;
use Models\OpinionsModel;
use Models\SchedulersModel;
use Exceptions\POSTNotFoundException;

require_once('../App/functions.php');

class HomeController{

    /**
     * Method view homepage
     * display services and Opinions
     * @param void
     * @return void
     */
    public function index(): void
    {
        session_start();
        $services = HomeModel::getAllServices();
        $opinions = OpinionsModel::getAccept();
        $opinionsLimit = OpinionsModel::getLimitOp();   
        $schedulers = SchedulersModel::getScheduler();
        ob_start();        
        require(dirname(__DIR__).DIRECTORY_SEPARATOR.'Views'.DIRECTORY_SEPARATOR.'pages'.DIRECTORY_SEPARATOR.'home.php');
        $pageContent = ob_get_clean();
        
        require(dirname(__DIR__).DIRECTORY_SEPARATOR.'Views'.DIRECTORY_SEPARATOR.'layout.php');

    }

    /** 
     * Method to update services with authenticated administrator
     * @param void
     * @return void
    */
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
            throw new POSTNotFoundException('Variable POST has been not found');
        }
       
    }
  
}