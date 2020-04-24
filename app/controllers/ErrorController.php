<?php

class ErrorController extends Controller
{

    public function notFoundAction() {

        $view = $this->createView(ErrorView::class);
        $view->render();
    }
}