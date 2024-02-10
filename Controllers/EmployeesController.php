<?php declare (strict_types = 1);

namespace Controllers;

use Models\EmployeesModel;

class EmployeesController 
{
   
    public function index():void
    {
        $employees = EmployeesModel::getEmployees();
        require(dirname(__DIR__).DIRECTORY_SEPARATOR.'public'.DIRECTORY_SEPARATOR.'pages'.DIRECTORY_SEPARATOR.'management.php');
    
    }

    public static function add():void
    {
        
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