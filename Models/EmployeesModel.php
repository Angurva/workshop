<?php declare (strict_types = 1);

namespace Models;

class EmployeesModel extends AbstractModel
{
    public static function getEmployees():array
    {
       return self::getAll('employees');
    }

    public static function addEmployee(string $em_firstname, string $em_lastname, string $em_email, string $em_password):void
    {
        $req = parent::getConnection()->prepare("INSERT INTO employees(em_firstname,em_lastname,em_email,em_password) VALUES (:em_firstname, :em_lastname, :em_email, :em_password)");
        $req->bindValue(':em_firstname', $em_firstname);
        $req->bindValue(':em_lastname', $em_lastname);
        $req->bindValue(':em_email', $em_email);
        $req->bindValue(':em_password', \password_hash($em_password, PASSWORD_BCRYPT));
        $req->execute();
        $req-> closeCursor();
    }

    public static function deleteEmployee(int|string $employeeID):void
    {
        $req = parent::getConnection()->prepare("DELETE FROM employees WHERE em_id=:em_id");
        $req->bindParam(':em_id', $employeeID);
        $req->execute();
        $req-> closeCursor();
    }
    public static function updateEmployee():void
    {

    }
}