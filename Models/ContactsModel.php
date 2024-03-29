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
        $req = parent::getConnection()->prepare("INSERT INTO contacts (co_firstname,co_lastname,co_email,co_phone,co_subject,co_description) VALUES (:co_firstname,:co_lastname,:co_email,:co_phone,:co_subject,:co_description)");
        $req->bindParam(':co_firstname',$form['co_firstname']);
        $req->bindParam(':co_lastname',$form['co_lastname']);
        $req->bindParam(':co_email',$form['co_email']);
        $req->bindParam(':co_phone',$form['co_phone']);
        $req->bindParam(':co_subject',$form['co_subject']);
        $req->bindParam(':co_description',$form['co_description']);
        $req->execute();
        $req->closeCursor();

    }
    public static function pending():int|string
    {
        $req = parent::getConnection()->prepare("SELECT COUNT(*) FROM contacts WHERE co_status = 'pending'");
        $req->execute();
        $nbPending = $req->fetch(\PDO::FETCH_NUM);
        $req->closeCursor();
        return $nbPending[0];

    }
    public static function getPending():array
    {
        $req = parent::getConnection()->prepare("SELECT * FROM contacts WHERE co_status = 'pending'");
        $req->execute();
        $result = $req->fetchAll();
        $req->closeCursor();
        return $result;
    }

    public static function validate(int|string $co_id):void
    {
        $req = parent::getConnection()->prepare("UPDATE contacts SET co_status = :co_status WHERE co_id = :co_id");
        $req->bindValue(':co_id', $co_id);
        $req->bindValue(':co_status', 'enabled');
        $req->execute();
        $req->closeCursor();
    }
    


}