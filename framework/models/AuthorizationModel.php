<?php

class AuthorizationModel extends Model
{

    private $users = null;

    public function __construct() {

        parent::__construct();

    }

    public function login($login, $password) {

        if ($this->validateByPassword($login, $password)) {

            $hash = $this->makeCookieHash($login, $this->makePasswordHash($password));
            $this->authorize($login, $hash);

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

        if ( isset($_COOKIE['login']) AND !empty($_COOKIE['login']) AND isset($_COOKIE['hash']) AND !empty($_COOKIE['hash']) ) {

            if ($this->validateByHash($_COOKIE['login'], $_COOKIE['hash'])) {

                return true;
            } else {

                return false;
            }

        } else {

            return false;
        }
    }

    private function validateByPassword($login, $password) {

        $user = $this->getUserData($login);
        $password_hash = $this->makePasswordHash($password);

        if ($user['password'] === $password_hash) {

            return true;
        } else {

            return false;
        }
    }

    private function validateByHash($login, $hash) {

        $user = $this->getUserData($login);
        $calculated_hash = $this->makeCookieHash($user['login'], $user['password']);

        if ($calculated_hash === $hash) {

            return true;
        } else {

            return false;
        }
    }

    public function prolongSession() {

        return $this->authorize($_COOKIE['login'], $_COOKIE['hash']);
    }

    private function authorize($login, $hash, $time = 3600) {

        $set_time = time() + $time;

        setcookie('login', $login,  $set_time, '/', $_SERVER['SERVER_NAME']);
        setcookie('hash', $hash,  $set_time, '/', $_SERVER['SERVER_NAME']);

        return true;
    }

    private function makePasswordHash($password) {

        $hash = md5($password);

        return $hash;
    }

    private function makeCookieHash($login, $password_hash) {

        // Come up with something here
        $cookie_hash = md5($login . ' some salt ' . $password_hash);

        return $cookie_hash;
    }

    /*
    *
    * Some Database manipulation methods
    *
    */

    private function getUserData($login) {

        $login = addslashes($login);

        $query = "SELECT * FROM `users` WHERE login='" . $login . "'";

        $this->db->connect();
        $result = $this->db->query($query);
        $this->db->disconnect();
        
        // TODO: Check results. There must be just 1 row;
        if (is_array($result) AND count($result) > 0) {

            $user = $result[0];
            return $user;
        } else {

            return false;
        } 

    }
}