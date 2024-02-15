<?php declare (strict_types = 1);

namespace App;

use App\Tools;
use Controllers\HomeController;
use Controllers\WorkersController;
use Exceptions\FileNotFoundException;
use Exceptions\RouteNotFoundException;
use Exceptions\ControllersNotFoundException;
use Exceptions\ClassOrMethodNotFoundException;
use Exceptions\ClassControllerNameNotFoundException;

class Router{

    private array $routes;
    private const CONTROLLERS = 'Controllers';


    /**
     * function to record routes find to file JSON listpathRoutes.json
     * @param $pathfile path file for record uri with controller => class and method
     * @return void not return
     */
    public function recordRoutes(string $pathFile):void
    {   
       if (file_exists($pathFile) && (is_file($pathFile))) 
       {
           $json = json_decode(file_get_contents($pathFile),true);

            if (array_key_exists(self::CONTROLLERS, $json))
            {
                foreach ($json[self::CONTROLLERS] as $register=>$action)
                {
                     $this->routes[$register] = $action;           
                }
                
            } 
            else{
                throw new ControllersNotFoundException('Controllers not specified in list controllers file');
            }    
       }  
       else{
           throw new FileNotFoundException('File not found');
       }  
    }

    /** 
    * Method run check uri  into url and call callable or class . here class and are called if uri exist into listPathRoutes.json and controllers 
    * @param string uri to treatment
    * @return  callable | array [class,method]
    */
    public function run(string $uri): mixed
    {
        $path = explode('?', $uri)[0];
        $action = $this->routes[$path] ?? null;
        
        if (is_callable($action))
        {
            return $action();
        }

        if (is_array($action))
        {

          [$class, $method] = $action;
          
          require dirname(__DIR__).DIRECTORY_SEPARATOR.self::CONTROLLERS.DIRECTORY_SEPARATOR.$class.'.php';
          $class=self::CONTROLLERS.'\\'.$class;
            //echo $class;
          if(class_exists($class,false) && method_exists($class, $method))
          {
            $class = new $class();
            return call_user_func_array([$class,$method], []);
          }
          else{
            throw new ClassOrMethodNotFoundException('Class or Method not found');
          }

        }
        

        throw new RouteNotFoundException();
    }
    

/*
    public function addRoute(string $pathUrl, array|string $controllerPath):void
    {
        if (is_array( $controllerPath))
        {
           $strControllerPath = implode('#',$controllerPath);
           $this->routes[$pathUrl] = $this->sanitizer($strControllerPath);

        }
        elseif(is_string($controllerPath))
        {
            $this->routes[$pathUrl] = $this->sanitizer($controllerPath);
        }
        else{
            throw new ClassControllerNameNotFoundException('controller\'s name is written wrong');
        }
    }*/

    
/*
    public function getRoutes(): array
    {
        return $this->routes;
    }

    public function getPathFile():string
    {
       return self::FILE_PATH;
    }
   
*/


}