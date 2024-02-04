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
}