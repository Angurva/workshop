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
        $req = parent::getConnection()->prepare("SELECT v.ve_id,v.ve_designation,v.ve_price,v.ve_km,v.ve_year,v.ve_color,v.ve_doors,e.en_name,m.mo_name, b.br_name,v.ve_photo
        FROM vehicles AS v
        LEFT JOIN energies AS e ON v.en_id = e.en_id
        LEFT JOIN models AS m ON v.mo_id = m.mo_id
        LEFT JOIN brands AS b ON m.br_id = b.br_id ");

        $req->execute();
        return $req->fetchAll();
    }
    public static function getLastId():int
    {
        $req = parent::getConnection()->prepare("SELECT MAX(ve_id) FROM vehicles ");
        $req->execute();
        $result = $req->fetch(\PDO::FETCH_NUM);
        $req->closeCursor();
        return $result[0];
    }

    public static function getOneAnnounce(string|int $ve_id):array
    {
        $req = parent::getConnection()->prepare("SELECT v.ve_designation,v.ve_price,v.ve_km,v.ve_year,v.ve_color,v.ve_doors,e.en_name,m.mo_name, b.br_name,v.ve_photo
        FROM vehicles AS v
        LEFT JOIN energies AS e ON v.en_id = e.en_id
        LEFT JOIN models AS m ON v.mo_id = m.mo_id
        LEFT JOIN brands AS b ON m.br_id = b.br_id 
        WHERE v.ve_id = :ve_id");
        $req->bindParam(':ve_id',$ve_id);
        $req->execute();
        return $req->fetch(\PDO::FETCH_ASSOC);
    }

    public static function getSearch(string $typeSlider,string|int $min,string|int $max):array
    {
        $req = parent::getConnection()->prepare("SELECT v.ve_id,v.ve_designation,v.ve_price,v.ve_km,v.ve_year,v.ve_color,v.ve_doors,e.en_name,m.mo_name, b.br_name,v.ve_photo
        FROM vehicles AS v
        LEFT JOIN energies AS e ON v.en_id = e.en_id
        LEFT JOIN models AS m ON v.mo_id = m.mo_id
        LEFT JOIN brands AS b ON m.br_id = b.br_id 
        WHERE $typeSlider BETWEEN $min AND $max");
        /*$req->bindParam(':type_slider',$typeSlider);
        $req->bindParam(':min',$min);
        $req->bindParam(':max',$max);*/
        $req->execute();
        return $req->fetchAll();   
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
    public static function getImages(string|int $ve_id):array
    {
        $req = parent::getConnection()->prepare("SELECT * FROM images WHERE ve_id = :ve_id");
        $req->bindParam(':ve_id',$ve_id);
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

    public static function getEquipmentsAnnounce(string|int $ve_id):array
    {
        $req = parent::getConnection()->prepare("SELECT eq.eq_name FROM vehicles AS v
        LEFT JOIN vehicles_equipments AS veq ON v.ve_id = veq.ve_id
        LEFT JOIN equipments AS eq ON veq.eq_id=eq.eq_id
        WHERE v.ve_id = :ve_id;");
        $req->bindParam(':ve_id',$ve_id);
        $req->execute();
        $result=$req->fetchAll();
        $req->closeCursor();
        return $result;
    }

    public static function setEquipments_vehicles(string|int $ve_id, string|int $eq_id):void
    {
        $req = parent::getConnection()->prepare("INSERT INTO vehicles_equipments (ve_id,eq_id) VALUES (:ve_id,:eq_id)");
        $req->bindParam(':ve_id', $ve_id);
        $req->bindParam(':eq_id', $eq_id);
        $req->execute();
        $req->closeCursor();
    }


    public static function setBrand(string $br_name):void
    {
        $req = parent::getConnection()->prepare("INSERT INTO brands (br_name) VALUES (:br_name)");
        $req->bindParam(':br_name', $br_name);
        $req->execute();
        $req->closeCursor();
        

    }

    public static function insertModel(string $model): void
    {
        $req = parent::getConnection()->prepare("INSERT INTO models (mo_name) VALUES (:mo_name)");
        $req->bindParam(':mo_name', $model);
        $req->execute();
        $req->closeCursor();

    }

    public static function setModel(string $model, string $brand):void
    {
        self::insertModel($model);
        $br_id = self::getBrand($brand);        
        $req = parent::getConnection()->prepare("UPDATE models SET br_id = :br_id WHERE mo_name=:mo_name");
        $req->bindParam(':br_id', $br_id);
        $req->bindParam(':mo_name', $model);
        $req->execute();
        $req->closeCursor();        
    }

    public static function getBrand(string $brand):int
    {
        $req = parent::getConnection()->prepare("SELECT br_id FROM brands WHERE br_name = :br_name");
        $req->bindParam('br_name', $brand);
        $req->execute();
        $result = $req->fetch(\PDO::FETCH_NUM);
        $req->closeCursor();
        return $result[0];
    }

    public static function getModel(string $model):int
    {
        
        $req = parent::getConnection()->prepare("SELECT mo_id FROM models WHERE mo_name = :mo_name");
        $req->bindParam('mo_name', $model);
        $req->execute();
        $result = $req->fetch(\PDO::FETCH_NUM);
        $req->closeCursor();
        return $result[0];
    }
    public static function getEnergy(string $energy):int
    {
        $req = parent::getConnection()->prepare("SELECT en_id FROM energies WHERE en_name = :en_name");
        $req->bindParam('en_name', $energy);
        $req->execute();
        $result = $req->fetch(\PDO::FETCH_NUM);
        $req->closeCursor();
        return $result[0];
    }

    public static function createAnnounce(string $designation,string|int $modelId, string|int $energyId, string|int $year, string|int $price, string|int $km,string $color,string|int $doors): void
    {

        $req = parent::getConnection()->prepare("INSERT INTO vehicles (ve_designation,mo_id,en_id,ve_year,ve_price,ve_km,ve_color,ve_doors) 
        VALUES (:ve_designation,:mo_id,:en_id,:ve_year,:ve_price,:ve_km,:ve_color,:ve_doors)");
        $req->bindParam(':ve_designation', $designation);
        $req->bindParam(':mo_id', $modelId);
        $req->bindParam(':en_id', $energyId);
        $req->bindParam(':ve_year', $year);
        $req->bindParam(':ve_price', $price);
        $req->bindParam(':ve_km', $km);
        $req->bindParam(':ve_color', $color);
        $req->bindParam(':ve_doors', $doors);
        $req->execute();
        $req->closeCursor();

    }

    public static function upPhoto(string|int $ve_id, string $path): void
    {
        $req = parent::getConnection()->prepare("UPDATE vehicles SET ve_photo = :ve_photo WHERE ve_id = :ve_id" );
        $req->bindParam(':ve_photo',$path);
        $req->bindParam(':ve_id',$ve_id);
        $req->execute();
        $req->closeCursor();
    }

    public static function upImages(string $im_name, string $im_path, string|int $ve_id): void
    {
        $req = parent::getConnection()->prepare("INSERT INTO images (im_name,im_path,ve_id) VALUES (:im_name,:im_path,:ve_id)");
        $req->bindParam(':im_name',$im_name);
        $req->bindParam(':im_path',$im_path);
        $req->bindParam(':ve_id',$ve_id);
        $req->execute();
        $req->closeCursor();
    }


}