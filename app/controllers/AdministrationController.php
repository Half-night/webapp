<?php

class AdministrationController extends Controller
{

    public function __construct() {

        parent::__construct();

        if ($this->auth->isAdmin() === true) {

            echo "User is Admin. It's OK!";
        } else {

            echo "User is NOT Admin. Go away!";
        }
    }

    public function indexAction() {


    }
}