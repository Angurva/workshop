<?php declare(strict_types = 1);

namespace Controllers;
require_once('../App/functions.php');

use Models\ContactsModel;
use Models\SchedulersModel;

class ContactController
{

    public function index()
    {        
        session_start();
        $co_pending= ContactsModel::getPending();
        $schedulers = SchedulersModel::getScheduler();
        ob_start();
        require ('..'. DIRECTORY_SEPARATOR .'Views' . DIRECTORY_SEPARATOR . 'pages' . DIRECTORY_SEPARATOR . 'contacts_check.php');
        $pageContent = ob_get_clean();
        require(dirname(__DIR__).DIRECTORY_SEPARATOR.'Views'.DIRECTORY_SEPARATOR.'layout.php');
    }

    public function contactForm():void
    {
        ContactsModel::addContact($this->sanitizeForm($_POST));
        header('Location: /');
       
    }

    public function sanitizeForm(array $form):array
    {
        foreach($form as $key => $data)
        {
            $formSanitize[$key] = sanitizeString($data);
        }
        return $formSanitize;
    }

    public function validate():void
    {
        if(isset($_POST['co_id']))
        {
            ContactsModel::validate($_POST['co_id']);
            header('Location: /contacts-list');
        }else{
            throw new RouteNotFoundException("error don't come on if");
        }
        
    }
}