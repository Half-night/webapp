<?php

class HomepageController extends Controller
{

    public function indexAction() {

        $model = new HomepageModel();
        $data = $model->get();

        $view = $this->createView(HomepageView::class, $data);
        $view->render();

    }
}