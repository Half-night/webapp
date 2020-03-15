<?php

class AdministrationController extends Controller
{

    public function __construct() {

        parent::__construct();

        if ($this->auth->isAdmin() !== true) {

            throw new Exception("You are NOT Administrator!");
        }
    }

    public function indexAction() {

        $view = $this->createView(AdministrationView::class);
        $view->render();
    }
}