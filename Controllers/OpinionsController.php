<?php declare (strict_types = 1);

namespace Controllers;

use Models\OpinionsModel;
use Models\SchedulersModel;


class OpinionsController{


    public function index()
    {
        //OpinionsModel::getOpinions();
        session_start();
        $op_pending= OpinionsModel::getPending();
        $schedulers = SchedulersModel::getScheduler();
        ob_start();
        require ('..'. DIRECTORY_SEPARATOR .'Views' . DIRECTORY_SEPARATOR . 'pages' . DIRECTORY_SEPARATOR . 'opinions_check.php');
        $pageContent = ob_get_clean();
        require(dirname(__DIR__).DIRECTORY_SEPARATOR.'Views'.DIRECTORY_SEPARATOR.'layout.php');
    }

    public function check_pending():array
    {
        return OpinionsModel::getPending();
    }

    public function accept():void
    {
        if(isset($_POST['op_id']))
        {
            OpinionsModel::accept($_POST['op_id']);
            header('Location: /opinions');
        }else{
            throw new RouteNotFoundException("error don't come on if");
        }
        
    }
    public function reject():void
    {
        if(isset($_POST['op_id']))
        {
            OpinionsModel::reject($_POST['op_id']);
            header('Location: /opinions');
        }else{
            throw new RouteNotFoundException("error don't come on if");
        }
        
    }
}