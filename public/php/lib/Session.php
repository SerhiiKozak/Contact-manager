<?php

class Session {

    public static $session_start = false;

    /**
     * @param String $key
     * @param $value
     * Create Session parameter.
     **/
    public static function set($key, $value) {
        if (!self::$session_start) {
            session_start();
            self::$session_start = session_start();
        }
        if (isset($_SESSION[$key]) || !empty($_SESSION[$key])) {
            $_SESSION[$key] .= $value;
        } else {
            $_SESSION[$key] = $value;
        }
    }

    /**
     * @param String $key
     * @return String $_SESSION['$key']
     * Return SESSION parameter by the Key.
     **/
    public static function get($key) {
        if (!self::$session_start) {
            session_start();
            self::$session_start = session_start();
        }

        if (isset($_SESSION[$key])) {
            return $_SESSION[$key];
        } else {
            return false;
        }
    }

    /**
     * Clear array of SESSION parameters and destroy Session.
     **/
    public static function destroy() {
        if (self::$session_start) {
            session_start();
            self::$session_start = session_start();
        }
        session_unset();
        $_SESSION = array();
        session_destroy();
    }
}