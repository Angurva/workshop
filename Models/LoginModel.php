<?php declare (strict_types = 1);

namespace Models;

class LoginModel extends AbstractModel
{
    public static function verify(string $email, string $password):mixed
    {
        $req=parent::getConnection()->prepare("SELECT * FROM employees WHERE em_email=:em_email");
        $req->bindValue(':em_email', $email);
        if ($req->execute())
        {
            $employee = $req->fetch(\PDO::FETCH_ASSOC);
            if($employee === false)
            {
                return 2;
            }
            else{
                if (password_verify($password, $employee['em_password']))
                {
                    return  $employee;
                }
                else{
                    return 2;
                }
            }
        }
        else
        {
            return 1;
        }

    }
}