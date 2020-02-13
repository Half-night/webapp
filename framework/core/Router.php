<?php

class Router
{

	private $routes = array();

	public function __construct() {

	}

	public function load($file) {

		if (file_exists($file)) {

			$routes = require_once $file;

			if (is_array($routes)) {

				foreach ($routes as $pattern => $route) {
					$this->routes[$pattern] = $route;
				}

				return true;
			} else {

				return false;
			}
		} else {

			return false;
		}
		
	}

	public function add() {

	}

	public function find($path) {

		foreach ($this->routes as $pattern => $route) {
			if (preg_match('#^' . $pattern . '$#', $path)) {

				$route_obj = new Route($route);
				return $route_obj;
			}
		}

		return false;
	}
}