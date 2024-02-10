<?php declare (strict_types = 1);

namespace Controllers;

use Models\HomeModel;


class HomeController{



    public function index()
    {

        $services = HomeModel::getAllServices();
        //var_dump($services[0]["se_title"]);
        require(dirname(__DIR__).DIRECTORY_SEPARATOR.'public'.DIRECTORY_SEPARATOR.'pages'.DIRECTORY_SEPARATOR.'home.php');

    }

    public function update(): void
    {
        HomeModel:: update($_POST['title'], $_POST['description']);
        header('Location: /');
    }
   /* public function index()
    {

        $loader = new FilesystemLoader(dirname(__DIR__).'/Views');
        $twig = new Environment($loader, [
            'cache' => false,
        ]);
        $services = HomeModel::getAllServices();
        //var_dump($services);
        
        echo $twig->render('Home/view.twig', ['services' => $services]);

    }*/
}