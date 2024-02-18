<?php declare (strict_types = 1);

namespace Models;

class ManagementModel extends AbstractModel
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
        $req->closeCursor();
    }
    public static function updateEmployee(array $data, string|int $em_id):void
    {
        if(isset($data))
        {
            //dump($data,$em_id);
            foreach($data as $key=>$value)
            { 
                $req = parent::getConnection()->prepare("UPDATE employees SET $key = :em_value WHERE em_id = :em_id");
                if ($key === 'em_password')
                {
                    $req->bindValue(':em_value',\password_hash($value, PASSWORD_BCRYPT));
                    $req->bindValue(':em_id',$em_id);

                }else{
                    $req->bindValue(':em_value',$value);
                    $req->bindValue(':em_id',$em_id);
                }
               
                $req->execute();
            }
            $req->closeCursor();
           
        }
        

    }
    public static function changePWD(string $password):void
    {
        
        $req = parent::getConnection()->prepare("UPDATE employees SET em_password = :em_password ");
        $req->bindParam(':em_password',\password_hash($password, PASSWORD_BCRYPT));
        $req->execute();
        $req->closeCursor();

    }

    
    public static function getOneEmployee(string|int $em_id):array
    {
        $req=parent::getConnection()->prepare("SELECT * FROM employees WHERE em_id = :em_id");
        $req->bindValue(':em_id', $em_id);
        $req->execute();
        $result = $req->fetch(\PDO::FETCH_ASSOC);
        return $result;
    }
}