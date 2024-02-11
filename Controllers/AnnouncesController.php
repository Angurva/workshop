<?php declare(strict_types = 1);

namespace Controllers;

use Models\AnnouncesModel;

require('../App/functions.php');

class AnnouncesController
{
    public function index(): void
    {   
        $announces = AnnouncesModel::getAnnounces();        
        require(dirname(__DIR__).DIRECTORY_SEPARATOR.'public'.DIRECTORY_SEPARATOR.'pages'.DIRECTORY_SEPARATOR.'announces.php');
       
    }

    public function slider(): void
    {   
        $min = \sanitizeString($_POST['min']);
        $max = \sanitizeString($_POST['max']);
        $announces = AnnouncesModel::getSearch($min,$max);
        echo json_encode($announces);
    }
}