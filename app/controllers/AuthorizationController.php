<?php

class AuthorizationController extends Controller
{

    private $view = null;

    /*
    public function __construct() {

        $this->auth = new AuthorizationModel();
    }
    */

    public function loginAction() {

        if ( $this->user_logged === true ) {

            $this->view = $this->createView(LoginView::class);
            $this->view->render();

        } else {

            if (isset($_POST['submit'])) {

                $login = isset($_POST['login']) ? $_POST['login'] : '';
                $password = isset($_POST['password']) ? $_POST['password'] : '';

                $this->auth->login($login, $password);

                // TODO: Come up with something here. Duplicate code.
                $this->user_logged = true;
                $this->user = $this->auth->getInfo();
                
                if ( $this->auth->isAdmin() ) {

                    $this->user['is_admin'] = true;
                } else {

                    $this->user['is_admin'] = false;
                }

                $this->data['user'] = $this->user;
            }

            $this->view = $this->createView(LoginView::class);
            $this->view->render();
            
        }

    }

    public function logoutAction() {

            $this->auth->logout();
    }
}