<?php

abstract class Model
{

    protected $db = null;
    protected $errors = null;

    public function __construct() {

        $this->db = Database::getInstance();
    }

    public function getErrors() {

        return $this->errors;
    }
}