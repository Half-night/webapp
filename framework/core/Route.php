<?php

class Route
{

    public $controller = null;
    public $method = null;

    public function __construct($route) {

        //TODO: validate route string

        $route_array = explode('@', $route);
        $this->controller = $route_array[0];
        $this->method = $route_array[1];
    }
}