<?php declare (strict_types = 1);
 

require dirname(__DIR__).DIRECTORY_SEPARATOR."vendor/autoload.php";

use App\Router;
use Exceptions\FileNotFoundException;
use Exceptions\RouteNotFoundException;
use Exceptions\PathNotCorrectlyWrittenException;
use Exceptions\ControllersNotFoundException;
use Exceptions\ClassOrMethodNotFoundException;
use Exceptions\ClassControllerNameNotFoundException;

define ('BASE_FILE_PATH' , dirname(__DIR__ ) . DIRECTORY_SEPARATOR . 'Conf' . DIRECTORY_SEPARATOR . 'listPathRoutes.json');
//const BASE_PATH_CONTROLLER = __DIR__ . DIRECTORY_SEPARATOR . 'Controllers' . DIRECTORY_SEPARATOR ;

$router = new Router;

try{
    $router->recordRoutes(BASE_FILE_PATH);
    $router->run($_SERVER['REQUEST_URI']);
}
catch(PathNotCorrectlyWrittenException $e)
{
    exit($e->getMessage());
}
catch(FileNotFoundException $e)
{
    exit($e->getMessage());
}
catch(ControllersNotFoundException $e)
{
    exit($e->getMessage()); 
}
catch(ClassOrMethodNotFoundException $e)
{
    exit($e->getMessage());
}
catch(RouteNotFoundException $e)
{
    exit($e->getMessage());
}

