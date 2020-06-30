<?php

class TestController extends Controller
{

    public function __construct() {

    }

    public function indexAction() {

        $this->model = new TestModel();

        $this->model->get();
    }
}