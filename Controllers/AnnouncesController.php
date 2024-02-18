<?php declare(strict_types = 1);

namespace Controllers;

use Models\AnnouncesModel;
use Models\SchedulersModel;
use Exceptions\POSTNotFoundException;

require('../App/functions.php');


class AnnouncesController
{
    /** 
     * method to display announces pages
     * @param void
     * @return void
     * display page announce
     * catch session if create
    */
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

    /** 
     * method to get a range of price 
     * @param void
     * @return void
     * sanitize 
     * return json for 
    */
    public function slider(): void
    {   
        if (isset($_POST['min']) && isset($_POST['max']))
        {
            $min = \sanitizeString($_POST['min']);
            $max = \sanitizeString($_POST['max']);
            $typeSlider = $_POST['typeSlider'];
            $announces = AnnouncesModel::getSearch($typeSlider,$min,$max);
            echo json_encode($announces);
        }
        else{
            throw new POSTNotFoundException('Variable POST has been not found');
        }
        
    }

    /** 
     * method to display page add a announce
     * display a new page
     * @param void
     * @return void
    */
    public function add(): void
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

    /** 
     * method to display detail for one announce
     * open a new page
     * @param void
     * @return void
    */
    public function details(): void
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

    public function addModel(): void
    {
        if (isset($_POST['br_name']) && isset($_POST['mo_name']))
        {
            $brand = $_POST['br_name'];
            $model = $_POST['mo_name'];
            $brands = AnnouncesModel::getBrands();
            $models = AnnouncesModel::getModels();
            if (!in_array($model, $models))
            {
                if (!in_array($brand, $brands))
                {
                    AnnouncesModel::setBrand($brand);
                }
                AnnouncesModel::setModel($model,$brand);

            }
            header('Location: /announces-add');
        }
    }

    public function createAnnounce(): void
    {
        //dump($_POST);
        if (isset($_POST))
        {

            //dump($_POST);
            $designation = $_POST['ve_designation'];
            $modelId = AnnouncesModel::getModel(\sanitizeString($_POST['mo_name']));
            $energyId = AnnouncesModel::getEnergy(\sanitizeString($_POST['en_name']));
            $year = \sanitizeString($_POST['ve_year']);
            $price = \sanitizeString($_POST['ve_price']);
            $km = \sanitizeString($_POST['ve_km']);
            $color = \sanitizeString($_POST['ve_color']);
            $doors = \sanitizeString($_POST['ve_doors']);

            AnnouncesModel::createAnnounce($designation,$modelId,$energyId,$year,$price,$km,$color,$doors);

            $lastId = AnnouncesModel::getLastId();
            $path = dirname(__DIR__).'/public/assets/A-'.$lastId;
            mkdir($path, 0777);
            $pathAbs = 'assets/A-'.$lastId;
            $file_photo = $_FILES['ve_photo']['tmp_name'];
            $filename = $_FILES['ve_photo']['name'];
            $pathfilename = $path.DIRECTORY_SEPARATOR.$filename;
            
            move_uploaded_file($file_photo, $pathfilename);
          
            $pathfilename = str_replace("/var/www/html/workshop/public/","",$pathfilename);
            AnnouncesModel::upPhoto($lastId,$pathfilename);

            $equipments = $_POST['eq_id'];
            foreach ($equipments as $equipment)
            {
                AnnouncesModel::setEquipments_vehicles($lastId,$equipment);
            }
           // dump($_FILES['images']);
           // dump($_FILES['images']['tmp_name']);
            if (isset($_FILES['images']))
            {

                $filesImages = resortArray($_FILES['images']);
            
                foreach($filesImages as $fileImage)
                {
                    $file_photo = $fileImage['name'];
                    $filetmp = $fileImage['tmp_name'];
                    $pathfilename = $path.DIRECTORY_SEPARATOR.$file_photo;  

                    move_uploaded_file($filetmp, $pathfilename);

                    $pathAbsFile = $pathAbs . DIRECTORY_SEPARATOR . $file_photo;

                    AnnouncesModel::upImages($file_photo, $pathAbsFile, $lastId);
                }
                //dump($_POST['eq_id']);
               

            }
            


            //$photo = $_POST['ve_photo'];
            //$designation = $_POST['ve_designation'];


        }
        header('Location: /announces');
       
    }

}