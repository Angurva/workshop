<?php declare (strict_types = 1);

namespace Controllers;

use Models\OpinionsModel;
use Models\SchedulersModel;
use Exceptions\POSTNotFoundException;


class OpinionsController{


     /** 
     * method to display opinions list in pending to enable 
     * @param void
     * @return void
    */
    public function index(): void
    {
        session_start();
        $op_pending= OpinionsModel::getPending();
        $schedulers = SchedulersModel::getScheduler();
        ob_start();
        require ('..'. DIRECTORY_SEPARATOR .'Views' . DIRECTORY_SEPARATOR . 'pages' . DIRECTORY_SEPARATOR . 'opinions_check.php');
        $pageContent = ob_get_clean();
        require(dirname(__DIR__).DIRECTORY_SEPARATOR.'Views'.DIRECTORY_SEPARATOR.'layout.php');
    }

     /** 
     * method to return list opinions in pending
     * @param void
     * @return array array with opinions in status pending
    */
    public function check_pending(): array
    {
        return OpinionsModel::getPending();
    }

     /** 
     * method to accept an opinion
     * @param void
     * @return void
    */
    public function accept(): void
    {
        if(isset($_POST['op_id']))
        {
            OpinionsModel::accept($_POST['op_id']);
            header('Location: /opinions');
        }else{
            throw new POSTNotFoundException('Variable POST has been not found');
        }
        
    }

    /** 
     * method to reject an opinion
     * @param void
     * @return void
    */
    public function reject(): void
    {
        if(isset($_POST['op_id']))
        {
            OpinionsModel::reject($_POST['op_id']);
            header('Location: /opinions');
        }else{
            throw new POSTNotFoundException('Variable POST has been not found');
        }  
    }

    /** 
     * method to add an opinion
    */
    public function add(): void
    {
        if (isset($_POST['op_surname']) && isset($_POST['op_note']) && isset($_POST['op_comments']))
        {
            OpinionsModel::createOpinion($_POST['op_surname'],$_POST['op_note'], $_POST['op_comments']);
            header('Location: /');
        }
        else{
            throw new POSTNotFoundException('Variable POST has been not found');
        }
    }
}