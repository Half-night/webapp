<?php

class TestController extends Controller
{

    public function __construct() {

    }

    public function indexAction() {

        $this->model = new TestModel();

        if ($_SERVER['REQUEST_METHOD'] === 'GET') {

            $result = $this->model->get();

            if ($result) {

                $data = $result; 
            }

        } elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $result = $this->model->add();

            if ($result === true) {

                $data['result'] = 'Data saved';
            } else {

                $data = $result;
            }
            d($data);

        }


        $view = $this->createView(TestView::class, $data);
        $view->render();
    }
}