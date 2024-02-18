<?php declare (strict_types = 1);

namespace Models;

use PDO;

require_once (dirname(__DIR__ ). DIRECTORY_SEPARATOR . "App/settings.php");

abstract class AbstractModel
{
    /** connection to bdd with PDO */
    private static PDO $connection;

    /**
     * method initialize connection PDO
     * @param void
     * @return void 
     */
    private static function initConnection()
    {
        self::$connection = new PDO(DSN,USR,PWD,OPT);
    }

    /**
     * method get connection PDO or initialize if not exist and return PDO
     * @param void
     * @return PDO 
     */
    protected static function getConnection(): PDO
    {
        if(!isset(self::$connection))
        {
            self::initConnection();
        }
        return self::$connection;
    }

    /** 
     * Method to connect a table and return all row
     * @param string : name of table to get 
     * @return array : table with all rows
    */
    protected static function getAll(string $tablename): array
    {
        $req = self::getConnection()->prepare("SELECT * FROM $tablename");
        $req->execute();
        $resultReq = $req->fetchAll();
        $req-> closeCursor();
        return $resultReq;
    }

    /** 
     * method to getdate
     * @param void
     * @return string : return date format YEAR-MONTH-day hours:minutes:seconds
    */
    protected static function getCreateAt(): string
    {
        return date(('Y-m-d h:i:s'));
    }

}