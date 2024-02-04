<?php declare (strict_types = 1);

namespace Controllers;

use Models\HomeModel;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;


class HomeController{


    public function index()
    {

        $loader = new FilesystemLoader(dirname(__DIR__).'/Views');
        $twig = new Environment($loader, [
            'cache' => false,
        ]);
        $services = HomeModel::getAllServices();
        //var_dump($services);
        
        echo $twig->render('Home/view.twig', ['services' => $services]);

    }
}