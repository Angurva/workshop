<?php declare(strict_types = 1);

namespace Controllers;


use Models\AnnouncesModel;

class AnnouncesController
{
    public function index(): void
    {   
        $announces = AnnouncesModel::getAnnounces();        
        require(dirname(__DIR__).DIRECTORY_SEPARATOR.'public'.DIRECTORY_SEPARATOR.'pages'.DIRECTORY_SEPARATOR.'announces.php');
       
    }

    public function slider(): void
    {   
        $announces = AnnouncesModel::getSearch($_POST['min'],$_POST['max']);
        echo json_encode($announces);
    }
}