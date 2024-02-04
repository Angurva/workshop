<?php declare (strict_types = 1);

namespace Models;

class AnnouncesModel extends AbstractModel
{
    public static function getAllAnnounces():array
    {
        return self::getAll('announces');
    }

}