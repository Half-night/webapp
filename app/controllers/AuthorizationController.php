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

                if ($this->auth->login($login, $password)) {

                    // TODO: Come up with something here. Duplicate code.
                    $this->user_logged = true;
                    $this->user = $this->auth->getInfo();
                    
                    if ( $this->auth->isAdmin() ) {

                        $this->user['is_admin'] = true;
                    } else {

                        $this->user['is_admin'] = false;
                    }

                    $this->data['user'] = $this->user;
                    
                } else {

                    // TODO: Come up with something here.
                    $this->data['errors'][] = 'Incorrect input';
                }

            }

            $this->view = $this->createView(LoginView::class, $this->auth->getData());
            $this->view->render();
            
        }

    }

    public function logoutAction() {

        $this->auth->logout();
    }

    public function registrationAction() {

        if ( $_SERVER['REQUEST_METHOD'] === 'GET' ) {

            $view = $this->createView(RegistrationView::class);
            $view->render();

            return true;

        } elseif ( $_SERVER['REQUEST_METHOD'] === 'POST' ) {

            if ($this->auth->checkRegister($_POST)) {

                $this->auth->register($_POST);
                
            } else {

                $view = $this->createView(RegistrationView::class);
                $view->render();
            }
        }
    }
}