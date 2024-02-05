<?php declare (strict_types = 1);

namespace Models;

class AnnouncesModel extends AbstractModel
{
    public static function getAllAnnounces():array
    {
        return self::getAll('announces');
    }

    public static function getAnnounces():array
    {
        $req = parent::getConnection()->prepare("SELECT v.ve_designation,v.ve_price,v.ve_km,v.ve_year,v.ve_color,v.ve_doors,e.en_name,m.mo_name, b.br_name
        FROM vehicles AS v
        LEFT JOIN energies AS e ON v.en_id = e.en_id
        LEFT JOIN models AS m ON v.mo_id = m.mo_id
        LEFT JOIN brands AS b ON m.br_id = b.br_id ");

        $req->execute();
        return $req->fetchAll();
    }

}