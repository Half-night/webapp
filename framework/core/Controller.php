<?php

abstract class Controller
{

    protected $auth = null;
    protected $user_logged = false;
    protected $user = null;

    public function __construct() {

        $this->auth = new AuthorizationModel();

        if ($this->auth->isLogged()) {

            $this->user_logged = true;
            $this->auth->prolongSession();
        }
    }
}