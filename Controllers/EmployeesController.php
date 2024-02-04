<?php declare (strict_types = 1);

namespace Controllers;

use Twig\Environment;
use Models\EmployeesModel;
use Twig\Loader\FilesystemLoader;

class EmployeesController 
{
    //#[Route('/',name: 'index')]
    public function index():void
    {
        $loader = new FilesystemLoader(dirname(__DIR__).'/Views');
        $twig = new Environment($loader, [
            'cache' => false,
        ]);

        $employees = EmployeesModel::getEmployees();
       /*foreach ($employees as $employee)
       {*/
            echo $twig->render('Management/view.twig', ['employees' => $employees]);
      /* }*/
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