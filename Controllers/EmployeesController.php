<?php declare (strict_types = 1);

namespace Controllers;

use Models\EmployeesModel;

require_once('../App/functions.php');

class EmployeesController 
{
   
    public function index():void
    {
        $employees = EmployeesModel::getEmployees();
        require(dirname(__DIR__).DIRECTORY_SEPARATOR.'public'.DIRECTORY_SEPARATOR.'pages'.DIRECTORY_SEPARATOR.'management.php');
    
    }

    public static function add():void
    {
        $em_firstname = \sanitizeString($_POST['em_firstname']);
        $em_lastname = \sanitizeString($_POST['em_lastname']);
        $em_email = \sanitizeString($_POST['em_email']);
        $em_password = \sanitizeString($_POST['em_password']);

        EmployeesModel::addEmployee($em_firstname,$em_lastname,$em_email,$em_password);
        header('Location: /management');

    }

    public static function delete():void
    {

        EmployeesModel::deleteEmployee($_POST['em_id']);
        header('Location: /management');
    }

    public static function update():void
    {
        header('Location: /management');
    }
}