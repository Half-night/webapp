<?php

class ErrorController extends Controller
{

	private $view = null;

	public function notFoundAction() {

		// Not needed when ClassMap->generate() is implemented
		ClassMap::add('ErrorView', APP_DIR . '/views/ErrorView.php');

		$this->view = new ErrorView();
		$this->view->render();

	}
}