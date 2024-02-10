<?php declare (strict_types = 1);

namespace Models;

class HomeModel extends AbstractModel
{
    public static function getAllServices():array
    {
        return self::getAll('services');
    }

    public static function update(string $title, string $description)
    {
        $req = self::getConnection()->prepare("UPDATE services SET se_description = :description WHERE se_title=:title ");
        $req->bindParam(':description', $description);
        $req->bindParam(':title', $title);
        $req->execute();        

    }

    protected static function getId(string $title):string
    {
        $req = self::getConnection()->prepare("SELECT se_id FROM services WHERE se_title = $title");
        $req->execute();
        $resultReq = $req->fetch(\PDO::FETCH_NUM);
        $req-> closeCursor();
        return $resultReq[0];
    }

}