<?php

class ErrorController extends Controller
{

	private $view = null;

	public function notFoundAction() {

		$this->view = new ErrorView();
		$this->view->render();

	}
}