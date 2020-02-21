<?php

class InstallationController extends Controller
{

    private $model = null;

    public function indexAction() {

        $this->model = new InstallationModel();
        $this->model->runDump();
    }
}