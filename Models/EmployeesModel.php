<?php declare (strict_types = 1);

namespace Models;

class EmployeesModel extends AbstractModel
{
    public static function getEmployees():array
    {
       return self::getAll('employees');
    }

    public static function addEmployee():void
    {

    }

    public static function deleteEmployee(int $employeeID):void
    {
        $req = parent::getConnection()->prepare("DELETE FROM employees WHERE id=:em_id");
        $req->bindParam(':em_id', $employeeID);
        $req->execute();
        $req-> closeCursor();
    }
}