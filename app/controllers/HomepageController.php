<?php

class HomepageController extends Controller
{

    private $view = null;
    private $model = null;

    public function indexAction() {

        $this->model = new HomepageModel();
        $data = $this->model->get();

        $this->view = new HomepageView($data);
        $this->view->render();

    }
}