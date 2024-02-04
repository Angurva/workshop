<?php declare (strict_types = 1);

namespace Models;

class ContactsModel extends AbstractModel
{
    public static function getContacts():array
    {
       return self::getAll('contacts');
    }

    //CREATE FORM CONTACT 
    public static function addContact(array $form):void
    {
        $req = self::getConnection()->prepare("INSERT INTO contacts (firstname,lastname,email,tel,subject,description,create_at) VALUES (:fname,:lname,:email,:phone,:subject,:description,:createat)");
        $req->bindParam(':fname',$form['firstname']);
        $req->bindParam(':lname',$form['lastname']);
        $req->bindParam(':email',$form['email']);
        $req->bindParam(':phone',$form['tel']);
        $req->bindParam(':subject',$form['subject']);
        $req->bindParam(':description',$form['description']);
        $req->bindParam(':createat',self::getCreateAt());
        $req->execute();
        $req->closeCursor();

    }

    


}