<?php

class Session {


    public static function init() {
       session_start();
       return $session = new Session();
    }

    public function set($key, $value) {
        if (isset($_SESSION[$key]) || !empty($_SESSION[$key])) {
            $_SESSION[$key] .= $value;
        } else {
            $_SESSION[$key] = $value;
        }

    }

    public function getUserId() {
        return $_SESSION['userId'];
    }

    public function get($key) {
        if (isset($_SESSION[$key])) {
            return $_SESSION[$key];
        } else {
            return false;
        }
    }

    public function destroy() {
        session_unset();
        $_SESSION=array();
        session_destroy();
    }

}