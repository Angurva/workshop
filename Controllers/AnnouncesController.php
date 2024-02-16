<?php declare(strict_types = 1);

namespace Controllers;

use Models\AnnouncesModel;
use Models\SchedulersModel;

require('../App/functions.php');

class AnnouncesController
{
    public function index(): void
    {   
        session_start();
        $announces = AnnouncesModel::getAnnounces();
        $schedulers = SchedulersModel::getScheduler();
        ob_start();     
        require(dirname(__DIR__).DIRECTORY_SEPARATOR.'Views'.DIRECTORY_SEPARATOR.'pages'.DIRECTORY_SEPARATOR.'announces.php');
        $pageContent = ob_get_clean();
        require(dirname(__DIR__).DIRECTORY_SEPARATOR.'Views'.DIRECTORY_SEPARATOR.'layout.php');
    }

    public function slider(): void
    {   
        $min = \sanitizeString($_POST['min']);
        $max = \sanitizeString($_POST['max']);
        $announces = AnnouncesModel::getSearch($min,$max);
        echo json_encode($announces);
    }

    public function add():void
    {
        session_start();
        $brands = AnnouncesModel::getBrands();
        $models = AnnouncesModel::getModels();
        $modelsBrand = AnnouncesModel::getModelsBrand();
        $energies = AnnouncesModel::getEnergies();
        $equipments = AnnouncesModel::getEquipments();
        $schedulers = SchedulersModel::getScheduler();
        ob_start();   
        require(dirname(__DIR__).DIRECTORY_SEPARATOR.'Views'.DIRECTORY_SEPARATOR.'pages'.DIRECTORY_SEPARATOR.'announceadd.php');
        $pageContent = ob_get_clean();
        require(dirname(__DIR__).DIRECTORY_SEPARATOR.'Views'.DIRECTORY_SEPARATOR.'layout.php');
    }

    public function details():void
    {
        session_start();
        if (isset($_POST['ve_id']))
        {
            $ve_id=$_POST['ve_id'];
            $announce = AnnouncesModel::getOneAnnounce($ve_id);
            $images = AnnouncesModel::getImages($ve_id);
            $equipments = AnnouncesModel::getEquipmentsAnnounce($ve_id);
            $schedulers = SchedulersModel::getScheduler();
            ob_start();   
            require(dirname(__DIR__).DIRECTORY_SEPARATOR.'Views'.DIRECTORY_SEPARATOR.'pages'.DIRECTORY_SEPARATOR.'announcedetails.php');
            $pageContent = ob_get_clean();
            require(dirname(__DIR__).DIRECTORY_SEPARATOR.'Views'.DIRECTORY_SEPARATOR.'layout.php');
        }
        else{
            echo 'error';
        }
        
    }


}