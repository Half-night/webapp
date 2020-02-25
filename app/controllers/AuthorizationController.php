<?php

class AuthorizationController extends Controller
{

    private $view = null;

    public function __construct() {

        $this->auth = new AuthorizationModel();
    }

    public function loginAction() {

        if (isset($_POST['submit'])) {

            $login = isset($_POST['login']) ? $_POST['login'] : '';
            $password = isset($_POST['password']) ? $_POST['password'] : '';



            $this->auth->login($login, $password);
        }

        $this->view = new LoginView();
        $this->view->render();

    }

    public function logoutAction() {

            $this->auth->logout();
    }
}