<?php declare (strict_types = 1);

namespace Models;

class HomeModel extends AbstractModel
{
    public static function getAllServices():array
    {
        return self::getAll('services');
    }

}