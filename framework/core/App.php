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
        
        if (! $route = $this->router->find($request_path)) {
            $route = new Route('Error@notFound');
        }
        
        // Not needed when ClassMap->generate() is implemented
        ClassMap::add($route->controller . 'Controller', APP_DIR . '/controllers/'
         . $route->controller . 'Controller.php');

        $controllerName = $route->controller . 'Controller';
        $this->controller = new $controllerName();

        $methodName = $route->method . 'Action';
        $this->controller->$methodName();
    }
}