<?php

abstract class View
{

    protected $data = array();
    protected $theme = 'default';
    
    public function __construct($data = array()) {
        
        $this->data = $data;
    }

    abstract public function render();
}