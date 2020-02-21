<?php

abstract class Controller
{

    protected $auth = null;

    public function __construct() {


        $this->auth = new AuthorizationModel(APP_DIR . '/config/users.php');
    }

}