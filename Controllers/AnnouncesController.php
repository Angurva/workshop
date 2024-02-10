<?php declare(strict_types = 1);

namespace Controllers;


use Models\AnnouncesModel;

class AnnouncesController
{
    public function index(): void
    {   
        /*if (isset($_POST['min']) && isset($_POST['max']))
        {
            $announces = AnnouncesModel::getSearch($_POST['min'],$_POST['max']);
        } 
        else{
            $announces = AnnouncesModel::getSearch(AnnouncesModel::getMinPrice(),AnnouncesModel::getMaxPrice());
        }*/

        $announces = AnnouncesModel::getAnnounces();        
        require(dirname(__DIR__).DIRECTORY_SEPARATOR.'public'.DIRECTORY_SEPARATOR.'pages'.DIRECTORY_SEPARATOR.'announces.php');
       
    }
    public function search()
    {
        $announces = AnnouncesModel::getSearch($_POST['min'],$_POST['max']);
        //$announces = AnnouncesModel::getSearch(AnnouncesModel::getMinPrice(),AnnouncesModel::getMaxPrice());
        //echo json_encode($announces);
    }

    public function slider(): void
    {   
        //$announces = AnnouncesModel::getSearch(AnnouncesModel::getMinPrice(),AnnouncesModel::getMaxPrice());
        $announces = AnnouncesModel::getSearch($_POST['min'],$_POST['max']);
        //var_dump($announces);
        //include (dirname(__DIR__).DIRECTORY_SEPARATOR.'public'.DIRECTORY_SEPARATOR.'pages'.DIRECTORY_SEPARATOR.'announces.php');
        echo json_encode($announces);
    }
}