<?php

class AuthorizationModel extends Model
{

    private $user = null;
    private $is_logged = null;
    private $is_admin = null;

    public function __construct() {

        parent::__construct();

    }

    public function login($login, $password) {

        if ($this->validateByPassword($login, $password)) {

            $hash = $this->makeCookieHash($login, $this->makePasswordHash($password));
            $this->authorize($login, $hash);
            $this->is_logged = true;
            
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

    public function register($data) {

        $login = addslashes($data['login']);
        $email = addslashes($data['email']);
        $password = addslashes($data['password']);

        if ($this->addUser($login, $email, $password)) {

            return true;
        } else {

            return false;
        }

    }

    public function getInfo() {

        if ( !is_null($this->user) ) {

            if ( isset($this->user['login']) AND isset($this->user['email'])) {

                $data['login'] = $this->user['login'];
                $data['email'] = $this->user['email'];

                return $data;
            } else {

                return false;
            }
        } else {

            return false;
        }
    }

    public function getData() {

        // TODO: Get rid of this. Set this data in corresponding View
        $data['title'] = 'Log in';
        $data['description'] = 'Log in form';
        $data['keywords'] = 'log in';

        return $data;
    }

    public function isLogged() {

        if ( !is_null($this->is_logged) AND $this->is_logged === true ) {

            return true;
        } elseif ( isset($_COOKIE['login']) AND !empty($_COOKIE['login']) AND isset($_COOKIE['hash']) AND !empty($_COOKIE['hash']) ) {

            if ($this->validateByHash($_COOKIE['login'], $_COOKIE['hash'])) {

                $this->is_logged = true;
                return true;
            } else {

                return false;
            }

        } else {

            return false;
        }
    }

    public function isAdmin() {

        if ($this->isLogged() AND !is_null($this->user) AND $this->user['login'] === 'admin') {

            return true;
        } else {

            return false;
        }

        /*
        // TODO : We need refactoring to prevent repeated methods calls
        if ( $this->is_admin === null ) {

            if (! isset($_COOKIE['login']) ) {

                return false;
            }
            
            $user = $this->getUserData($_COOKIE['login']);

            if ( $user['login'] === 'admin' ) {

                $this->is_admin = true;
                return true;

            } else {

                $this->is_admin = false;
                return false;
            }
        } else {

            if (is_bool($this->is_admin)) {

                return $this->is_admin;
            } else {

                return false;
            }
        }
        */
    }

    private function validateByPassword($login, $password) {

        $user = $this->getUserData($login);

        if ($user === false) {

            return false;
        }

        $password_hash = $this->makePasswordHash($password);

        if ($user['password'] === $password_hash) {

            $this->user = $user;
            return true;
        } else {

            return false;
        }
    }

    private function validateByHash($login, $hash) {

        $user = $this->getUserData($login);

        if ($user === false) {

            return false;
        }

        $calculated_hash = $this->makeCookieHash($user['login'], $user['password']);

        if ($calculated_hash === $hash) {

            $this->user = $user;
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


    // Check input data

    public function checkRegister($data = array()) {

        //TODO: Come up with the way to transfer error messages to the view

        if (isset($data['login']) 
            AND isset($data['email'])
            AND isset($data['password'])
            AND isset($data['password_2'])) {

            if (!empty($data['login']) AND !empty($data['email']) AND !empty($data['password']) AND !empty($data['password_2'])) {

                if ( $this->getUserData($data['login']) ) {

                    return false;
                } else {

                    if ($data['password'] === $data['password_2']) {

                        return true;
                    } else {

                        return false;
                    }
                }

            } else {

                return false;
            }

            return true;
        } else {

            return false;
        }
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

    private function addUser($login, $email, $password) {

        $password = $this->makePasswordHash($password);

        $query = "INSERT INTO users (`login`, `email`, `password`, `reg_time`) VALUES ('" . $login . "', '" . $email . "', '" . $password . "', NOW())";

        $this->db->connect();
        $result = $this->db->query($query);
        $this->db->disconnect();

        if ($result) {

            return true;
        } else {

            return false;
        }
    }
}