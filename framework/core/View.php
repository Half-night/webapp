<?php

abstract class View
{

	protected $data = array();
	
	public function __construct($data = array()) {
		
		$this->data = $data;
	}

	abstract public function render();
}