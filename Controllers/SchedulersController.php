<?php declare (strict_types = 1);

namespace Controllers;

use Models\SchedulersModel;


class SchedulersController{


    public function index()
    {
        $schedulers= SchedulersModel::getScheduler();

       // require ('..'. DIRECTORY_SEPARATOR .'Views' . DIRECTORY_SEPARATOR . 'pages' . DIRECTORY_SEPARATOR . '_footer.php');
    }

    public function changeScheduler():void
    {
        //var_dump($_POST);
        if (isset($_POST));
        { 
            SchedulersModel::changeScheduler($_POST);
        }
        header('Location: /');
        //return 
    }

  
}