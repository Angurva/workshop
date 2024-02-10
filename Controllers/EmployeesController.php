<?php declare (strict_types = 1);

namespace Controllers;

use Twig\Environment;
use Models\EmployeesModel;
use Twig\Loader\FilesystemLoader;

class EmployeesController 
{
   
    public function index():void
    {
        $employees = EmployeesModel::getEmployees();
        require(dirname(__DIR__).DIRECTORY_SEPARATOR.'public'.DIRECTORY_SEPARATOR.'pages'.DIRECTORY_SEPARATOR.'management.php');
    
    }

    public static function add():void
    {
        echo'cool ca marche';

    }

    public static function delete():void
    {

    }

    public static function update():void
    {

    }
}