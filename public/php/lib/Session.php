<?php

class Session {

    public static $session_start = false;

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

    public static function getUserId() {
        if (!self::$session_start) {
            session_start();
            self::$session_start = session_start();
        }
        return $_SESSION['userId'];
    }

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