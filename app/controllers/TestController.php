<?php

class TestController extends Controller
{

    public function __construct() {

    }

    public function indexAction() {

        $data = array();
        $this->model = new TestModel();

        $result = $this->model->get();

        if ($result) {

            $data['template'] = 'test_index';
            $data['test_index'] = $result;
        }

        $view = $this->createView(TestView::class, $data);
        $view->render();
    }

    public function addAction() {

        $data = array();
        $this->model = new TestModel();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $respose = $this->model->add();

            if ($respose !== true) {

                $data['form_data'] = $respose;
                $data['errors'] = $this->model->getErrors();
            }
        }

        $data['template'] = 'test_add';
        //$data['test_add'] = $result;

        $view = $this->createView(TestView::class, $data);
        $view->render();
    }

    public function editAction() {

        $data = array();
        $this->model = new TestModel();

        $id = (int) explode('/', Config::get('request_path'))[2];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $respose = $this->model->update($id);

            if ($respose !== true) {

                $data['template'] = 'test_edit';
                $data['form_data'] = $respose;
                $data['form_data']['id'] = $id;
                $data['errors'] = $this->model->getErrors();
                
            } else {

                $data['template'] = 'test_saved';
            }

            $view = $this->createView(TestView::class, $data);

        } else {

            $result = $this->model->getById($id);

            if ($result) {

                $data['template'] = 'test_edit';
                $data['form_data'] = $result;

                $view = $this->createView(TestView::class, $data);

            } else {

                $view = $this->createView(ErrorView::class, $data);
            }
        }

        $view->render();
    }

    public function deleteAction() {

        $this->model = new TestModel();


        $view = $this->createView(TestView::class, $data);
        $view->render();
    }

    public function getAction() {

        $this->model = new TestModel();

        $id = (int) explode('/', Config::get('request_path'))[1];
        $data['test'] = $this->model->getById($id);
        $data['template'] = 'test_get';

        $view = $this->createView(TestView::class, $data);
        $view->render();
    }
}