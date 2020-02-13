<?php

class HomepageController extends Controller
{

	private $view = null;
	private $model = null;

	public function __construct() {

	}

	public function indexAction() {

		// Not needed when ClassMap->generate() is implemented
		ClassMap::add('HomepageView', APP_DIR . '/views/HomepageView.php');
		ClassMap::add('HomepageModel', APP_DIR . '/models/HomepageModel.php');


		$this->model = new HomepageModel();
		$data = $this->model->get();

		$this->view = new HomepageView($data);
		$this->view->render();

	}
}