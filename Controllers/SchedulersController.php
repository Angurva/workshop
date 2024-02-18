<?php declare (strict_types = 1);

namespace Controllers;

use Models\SchedulersModel;


class SchedulersController{


    public function index()
    {
        $schedulers= SchedulersModel::getScheduler();
    }

    public function changeScheduler():void
    {
        if (isset($_POST));
        { 
            SchedulersModel::changeScheduler($_POST);
        }
        //header('Location: /');
    }

  
}