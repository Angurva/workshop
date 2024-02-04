<?php declare (strict_types = 1);

namespace Controllers;

use Models\OpinionsModel;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;


class OpinionsController{


    public function index()
    {

        $loader = new FilesystemLoader(dirname(__DIR__).'/Views');
        $twig = new Environment($loader, [
            'cache' => false,
        ]);
        
        
        echo $twig->render('/view.twig', ['opinions' => $opinions]);

    }
}