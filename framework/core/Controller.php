<?php

abstract class Controller
{

    protected $auth = null;
    protected $user_logged = false;
    protected $user = null;
    protected $data = array();

    public function __construct() {

        $this->auth = new AuthorizationModel();

        if ($this->auth->isLogged()) {

            $this->user_logged = true;
            $this->user = $this->auth->getInfo();
            if ( $this->auth->isAdmin() ) {

                $this->user['is_admin'] = true;
            } else {

                $this->user['is_admin'] = false;
            }
            $this->auth->prolongSession();

            $this->data['user'] = $this->user;
        }
    }

    protected function createView($class, $data = array()) {

        $view = new $class($data);
        $view->setData($this->data);

        return $view;
    }
}