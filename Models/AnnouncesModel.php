<?php declare (strict_types = 1);

namespace Models;

class AnnouncesModel extends AbstractModel
{
    public static function getAllAnnounces():array
    {
        return self::getAll('vehicles');
    }

    public static function getAnnounces():array
    {
        $req = parent::getConnection()->prepare("SELECT v.ve_designation,v.ve_price,v.ve_km,v.ve_year,v.ve_color,v.ve_doors,e.en_name,m.mo_name, b.br_name,v.ve_photo
        FROM vehicles AS v
        LEFT JOIN energies AS e ON v.en_id = e.en_id
        LEFT JOIN models AS m ON v.mo_id = m.mo_id
        LEFT JOIN brands AS b ON m.br_id = b.br_id ");

        $req->execute();
        return $req->fetchAll();
    }

    public static function getSearch(string|int $min,string|int $max):array
    {
        /*if (!isset($min) && !isset($max))
        {*/
            $req = parent::getConnection()->prepare("SELECT v.ve_designation,v.ve_price,v.ve_km,v.ve_year,v.ve_color,v.ve_doors,e.en_name,m.mo_name, b.br_name,v.ve_photo
            FROM vehicles AS v
            LEFT JOIN energies AS e ON v.en_id = e.en_id
            LEFT JOIN models AS m ON v.mo_id = m.mo_id
            LEFT JOIN brands AS b ON m.br_id = b.br_id 
            WHERE v.ve_price BETWEEN $min AND $max");
            $req->execute();
            return $req->fetchAll();
       /* }
        else{
            $req = parent::getConnection()->prepare("SELECT v.ve_designation,v.ve_price,v.ve_km,v.ve_year,v.ve_color,v.ve_doors,e.en_name,m.mo_name, b.br_name
        FROM vehicles AS v
        LEFT JOIN energies AS e ON v.en_id = e.en_id
        LEFT JOIN models AS m ON v.mo_id = m.mo_id
        LEFT JOIN brands AS b ON m.br_id = b.br_id ");

        $req->execute();
        return $req->fetchAll();
        }*/
       
    }

    public static function getMaxPrice():int|string
    {
        $req = parent::getConnection()->prepare("SELECT MAX(ve_price) FROM vehicles");
        $req->execute();
        $result = $req->fetch(\PDO::FETCH_NUM);
        return $result[0];

    }

    public static function getMinPrice():int|string
    {
        $req = parent::getConnection()->prepare("SELECT MIN(ve_price) FROM vehicles");
        $req->execute();
        $result = $req->fetch(\PDO::FETCH_NUM);
        return $result[0];
    }

    public static function getBrands():array
    {
        $req = parent::getConnection()->prepare("SELECT * FROM brands");
        $req->execute();
        $result = $req->fetchAll(\PDO::FETCH_ASSOC);
        $req->closeCursor();
        return $result;

    }
    public static function getModels():array
    {
        $req = parent::getConnection()->prepare("SELECT * FROM models");
        $req->execute();
        $result = $req->fetchAll(\PDO::FETCH_ASSOC);
        $req->closeCursor();
        return $result;
        
    }
    public static function getModelsBrand():array
    {
        $req = parent::getConnection()->prepare("SELECT b.br_name, m.mo_name
        FROM brands AS b
        LEFT JOIN models AS m ON b.br_id = m.br_id");
        $req->execute();
        $result = $req->fetchAll(\PDO::FETCH_ASSOC);
        $req->closeCursor();
        return $result;
        
    }
    public static function getEnergies():array
    {
        $req = parent::getConnection()->prepare("SELECT * FROM energies");
        $req->execute();
        $result = $req->fetchAll(\PDO::FETCH_ASSOC);
        $req->closeCursor();
        return $result;
        
    }

    public static function getEquipments():array
    {
        $req = parent::getConnection()->prepare("SELECT * FROM equipments");
        $req->execute();
        $result = $req->fetchAll(\PDO::FETCH_ASSOC);
        $req->closeCursor();
        return $result;
        
    }

}