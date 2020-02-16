<?php

class UserModel extends Model
{

    private $users = null;

    public function __construct($users_file) {

        parent::__construct();


        if (file_exists($users_file)) {

            $users = include $users_file;

            if (is_array($users)) {

                $this->users = $users;
                return true;

            } else {

                return false;
            }
        } else {

            return false;
        }
    }

    public function login($login, $password) {


        if ($this->validate($login, $password)) {

            $this->authorize($login, $password);

            return true;
        } else {

            return false;
        }
    }

    public function logout() {

        $this->authorize('', '', -3600);

        header("Location: /");

        return true;
    }

    public function register($login, $password) {

    }

    public function isLogged() {

    }

    private function validate($login, $password) {

        if (isset($this->users[$login])) {

            $user = $this->users[$login];

            if ($user['login'] === $login AND $user['password'] === $password) {

                return true;
            } else {

                return false;
            }

        } else {

            return false;
        }
    }

    private function authorize($login, $password, $time = 3600) {

        $set_time = time() + $time;
        setcookie('login', $login,  $set_time, '/', $_SERVER['SERVER_NAME']);
        setcookie('password', $password,  $set_time, '/', $_SERVER['SERVER_NAME']);
    }
}