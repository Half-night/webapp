<?php

class HomepageController extends Controller
{

    private $view = null;
    private $model = null;

    public function indexAction() {

        $this->model = new HomepageModel();
        $data = $this->model->get();

        $this->view = $this->createView(HomepageView::class, $data);
        $this->view->render();

    }
}