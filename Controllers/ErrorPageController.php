<?php declare (strict_types = 1);

namespace Controllers;


class ErrorPageController{

    /**
     * method to display error page
     * @param void
     * @return void
     * */ 
    public function error(): void
    {
        require(dirname(__DIR__).DIRECTORY_SEPARATOR.'Views'.DIRECTORY_SEPARATOR.'pages'.DIRECTORY_SEPARATOR.'404.php');
    }

}