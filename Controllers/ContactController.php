<?php declare(strict_types = 1);

namespace Controllers;
require_once('../App/functions.php');

use Models\ContactsModel;
use Models\SchedulersModel;
use Exceptions\POSTNotFoundException;

class ContactController
{

    /**
     * Method to display form waiting
     * method display for users authenticated
     * @param void
     * @return void
     */
    public function index(): void
    {        
        session_start();
        $co_pending= ContactsModel::getPending();
        $schedulers = SchedulersModel::getScheduler();
        ob_start();
        require ('..'. DIRECTORY_SEPARATOR .'Views' . DIRECTORY_SEPARATOR . 'pages' . DIRECTORY_SEPARATOR . 'contacts_check.php');
        $pageContent = ob_get_clean();
        require(dirname(__DIR__).DIRECTORY_SEPARATOR.'Views'.DIRECTORY_SEPARATOR.'layout.php');
    }


    /** 
     * Method to create a contact form
     * sanitize $_POST array
     * @param void
     * @return void
    */
    public function contactForm():void
    {
        if (isset($_POST))
        {
            ContactsModel::addContact($this->sanitizeForm($_POST));
            header('Location: /');
        }
        else{
            throw new POSTNotFoundException('Variable POST has been not found');
        }       
    }
    /** 
     * method to sanitize array
     * @param array
     * @return array
     */

    public function sanitizeForm(array $form):array
    {
        foreach($form as $key => $data)
        {
            $formSanitize[$key] = sanitizeString($data);
        }
        return $formSanitize;
    }

    /** 
     * method to enable a form
    */
    public function validate():void
    {
        if(isset($_POST['co_id']))
        {
            ContactsModel::validate($_POST['co_id']);
            header('Location: /contacts-list');
        }else{
            throw new POSTNotFoundException('Variable POST has been not found');
        }
        
    }
}