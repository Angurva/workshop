<?php declare (strict_types = 1);

namespace Models;

use PDO;
require_once (dirname(__DIR__ ). DIRECTORY_SEPARATOR . "App/settings.php");

abstract class AbstractModel
{
    private static PDO $connection;

    private static function initConnection()
    {
        self::$connection = new PDO(DSN,USR,PWD,OPT);
    }

    protected static function getConnection():PDO
    {
        if(!isset(self::$connection))
        {
            self::initConnection();
        }
        return self::$connection;
    }

    protected static function getAll(string $tablename):array
    {
        $req = self::getConnection()->prepare("SELECT * FROM $tablename");
        $req->execute();
        $resultReq = $req->fetchAll();
        $req-> closeCursor();
        return $resultReq;
    }

    protected static function getCreateAt():string
    {
        return date(('Y-m-d h:i:s'));
    }

}