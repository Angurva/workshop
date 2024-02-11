<?php declare (strict_types = 1);

namespace Controllers;


class ErrorPageController{

public function error()
{
    require(dirname(__DIR__).DIRECTORY_SEPARATOR.'public'.DIRECTORY_SEPARATOR.'pages'.DIRECTORY_SEPARATOR.'404.php');
}

}