<?php declare (strict_types = 1);

namespace Controllers;

use Models\ManagementModel;
use Models\SchedulersModel;

require_once('../App/functions.php');

class ManagementController 
{
   
    /** 
     * method to display management page
     * administrator authenticated necessary
     * @param void
     * @return void
    */
    public function index(): void
    {
        session_start();
        $employees = ManagementModel::getEmployees();
        $schedulers = SchedulersModel::getScheduler();
        ob_start();
        require(dirname(__DIR__).DIRECTORY_SEPARATOR.'Views'.DIRECTORY_SEPARATOR.'pages'.DIRECTORY_SEPARATOR.'management.php');
        $pageContent = ob_get_clean();
        require(dirname(__DIR__).DIRECTORY_SEPARATOR.'Views'.DIRECTORY_SEPARATOR.'layout.php');
    
    }

    /** 
     * method to add an user
     * @param void
     * @return void
    */
    public static function add(): void
    {
        if(isset($_POST['em_firstname']) && isset($_POST['em_lastname']) && isset($_POST['em_email']) && isset($_POST['em_password']))
        {
            $em_firstname = \sanitizeString($_POST['em_firstname']);
            $em_lastname = \sanitizeString($_POST['em_lastname']);
            $em_email = \sanitizeString($_POST['em_email']);
            $em_password = \sanitizeString($_POST['em_password']);
            ManagementModel::addEmployee($em_firstname,$em_lastname,$em_email,$em_password);
            header('Location: /management');
        }
        else{
            throw new POSTNotFoundException('Variable POST has been not found');
        }
    }

    /** 
     * method to delete an user
     * @param void
     * @return void
    */
    public static function delete(): void
    {

        ManagementModel::deleteEmployee($_POST['em_id']);
        header('Location: /management');
    }

     /** 
     * method to display page update an user
     * @param void
     * @return void
    */
    public static function updatePage(): void
    {
        if(isset($_POST['em_id']))
        {
            session_start();
            $schedulers = SchedulersModel::getScheduler();
            $employee = ManagementModel::getOneEmployee($_POST['em_id']);
            ob_start();
            require(dirname(__DIR__).DIRECTORY_SEPARATOR.'Views'.DIRECTORY_SEPARATOR.'pages'.DIRECTORY_SEPARATOR.'management_update.php');
            $pageContent = ob_get_clean();
            require(dirname(__DIR__).DIRECTORY_SEPARATOR.'Views'.DIRECTORY_SEPARATOR.'layout.php');
        }else
        {
            throw new POSTNotFoundException('Variable POST has been not found');
        }
        
    }

    /** 
     * method to update an user
     * @param void
     * @return void
    */
    public static function update(): void
    {
        if (isset($_POST['em_id']))
        {
            $compare = array_diff_assoc($_POST, ManagementModel::getOneEmployee($_POST['em_id']));
            ManagementModel::updateEmployee($compare,$_POST['em_id']);
            header('Location: /management');
        }
        else{
            throw new POSTNotFoundException('Variable POST has been not found');
        } 
    }

     /** 
     * method to change an user
     * @param void
     * @return void
    */
    public static function changePWD(): void
    {
        if(isset($_POST['new_password']))
        {
            $password = $_POST['new_password'];
            $password = \sanitizeString ($password);
            ManagementModel::changePWD($password);
            header("Location: /");
        }
       else{
        throw new POSTNotFoundException('Variable POST has been not found');
       }
    }
}