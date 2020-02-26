<?php

class CustomPageController extends Controller
{


    public function indexAction() {

        $model = new CustomPageModel();

        // TODO: implement another way to transfer request_path
        $data = $model->get(Config::get('request_path'));

        if ( !$data ) {
            
            return false;
        }

        $view = new CustomPageView($data);
        $view->render();
    }
}