<?php declare(strict_types = 1);

namespace Controllers;


use Models\AnnouncesModel;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;


class AnnouncesController
{
    public function index()
    {
        $loader = new FilesystemLoader(dirname(__DIR__).'/Views');
        $twig = new Environment($loader, [
            'cache' => false,
        ]);
        //$announces = AnnouncesModel::getAllServices();
        $test = 'Bonjour annonces';

        echo $twig->render('Announces/view.twig', ['announces' => $test]);
    }
}