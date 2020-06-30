<?php

class Data
{

    private $data = array();

    public function __construct() {}

    public function set($name, $value) {
        $this->data[$name] = $value;
        return true;
    }

    public function get($name) {

        if (isset($this->data[$name])) {

            return $this->data[$name];
        } else {

            return null;
        }
    }

    public function del($name) {
        if (isset($this->data[$name])) {

            unset($this->data[$name]);
            return true;
        } else {

            return false;
        }
    }

    public function getAll() {
        
        return $this->data;
    }
}