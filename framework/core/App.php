<?php

class App
{
    
    private $router = null;
    private $controller = null;

    public function __construct() {

        $this->router = new Router();
        $this->router->load(APP_DIR . '/config/routes.php');
    }

    public function run() {
        
        $request_path = str_replace('?'.$_SERVER['QUERY_STRING'], '', $_SERVER['REQUEST_URI']);
        $request_path = trim($request_path, '/');

        // TODO: implement another way to store request_path
        Config::set('request_path', $request_path);
        
        if ($route = $this->router->find($request_path) AND
            ClassMap::get($route->controller . "Controller") AND
            method_exists($route->controller . "Controller", $route->method . "Action")) {

            $controllerName = $route->controller . 'Controller';
            $methodName = $route->method . 'Action';

            try {

                $this->controller = new $controllerName();
            } catch (Exception $e) {

                $methodName = 'notFoundAction';
                $this->controller = new ErrorController();
            }

            if ( $this->controller->$methodName() === false ) {

                $this->controller = new ErrorController();
                $this->controller->notFoundAction();
            }

        } else {

            die("Oops, we have problems :-/");
        }
    }
}