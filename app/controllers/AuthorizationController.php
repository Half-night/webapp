<?php

class AuthorizationController extends Controller
{

    private $view = null;

    public function loginAction() {

        // Not needed when ClassMap->generate() is implemented
        ClassMap::add('UserModel', FRAMEWORK_DIR . '/models/UserModel.php');
        ClassMap::add('LoginView', APP_DIR . '/views/LoginView.php');


        if (isset($_POST['submit'])) {

            $login = isset($_POST['login']) ? $_POST['login'] : '';
            $password = isset($_POST['password']) ? $_POST['password'] : '';

            $user = new UserModel(APP_DIR . '/config/users.php');
            $user->login($login, $password);
        }

        $this->view = new LoginView();
        $this->view->render();

    }

    public function logoutAction() {

        // Not needed when ClassMap->generate() is implemented
        ClassMap::add('UserModel', FRAMEWORK_DIR . '/models/UserModel.php');

        $user = new UserModel(APP_DIR . '/config/users.php');
        $user->logout();

    }
}