<?php declare(strict_types = 1);

namespace Controllers;
require_once('../App/functions.php');

use Models\ContactsModel;

class ContactController
{
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

}