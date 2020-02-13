<?php

class Container
{

	private $dependencies = array();

	public function __construct() {
	}

	public function register($name, $dependency) {
		$this->dependencies[$name][] = $dependency;
	}

	public function get($name) {
		return $this->dependencies[$name];
	}

	public function build($name) {
		$dependency = $this->dependencies[$name];
		return new $dependency();
	}
}