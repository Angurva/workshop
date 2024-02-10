<?php declare(strict_types = 1);

namespace Controllers;


use Twig\Environment;
use Laminas\Http\Request;
use Models\AnnouncesModel;
use Twig\Loader\FilesystemLoader;
use \Twig\TwigTest;


class AnnouncesController
{
    public function index()
    {     

        
        $loader = new FilesystemLoader(dirname(__DIR__).'/Views');
        $twig = new Environment($loader, [
            'cache' => false,
            'auto_reload' => true,
        ]);
        //$template = $twig->load('Announces/view.twig');
        
        //$test = new TwigTest();

        if (isset($_POST['min']) && isset($_POST['max']))
        {
            /*$loader = new FilesystemLoader(dirname(__DIR__).'/Views');
        $twig = new Environment($loader, [
            'cache' => false,
            'auto_reload' => true,
        ]);*/
            //$template = $twig->load('Announces/view.twig');
        
            $announces = AnnouncesModel::getSearch($_POST['min'],$_POST['max']);
            //echo $template->renderBlock( 'main',['announces' => $announces]);
            //echo $twig->render('Announces/view.twig',['announces' => $announces]);
            echo json_encode($announces);
        }
        else{
           /* $loader = new FilesystemLoader(dirname(__DIR__).'/Views');
        $twig = new Environment($loader, [
            'cache' => false,
            'auto_reload' => true,
        ]);*/
            /*$max = AnnouncesModel::getMaxPrice();
            $min = AnnouncesModel::getMinPrice();*/
            
            $announces = AnnouncesModel::getSearch(AnnouncesModel::getMinPrice(),AnnouncesModel::getMaxPrice());
            //echo $template->renderBlock( 'main',['announces' => $announces]);
            echo $twig->render('Announces/view.twig',['announces' => $announces]);
        }
                
    }
    public function search()
    {
        //$request = new Request();
        //var_dump($request->getQuery());
        $loader = new FilesystemLoader(dirname(__DIR__).'/Views');
        $twig = new Environment($loader, [
            'cache' => false,
        ]);
        //var_dump($_POST['min'], $_POST['max']);
        $announces = AnnouncesModel::getSearch($_POST['min'],$_POST['max']);
        //return AnnouncesModel::getSearch($min,$max);
        //$test = 'Bonjour annonces';
        //var_dump($announces);
        echo json_encode($announces);
        //echo $twig->render('Announces/view.twig', ['announces' => $announces]);
    }
}