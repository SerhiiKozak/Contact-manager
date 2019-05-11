<?php

class Session {

    public static $session_start = false;
    static private $instance = null;

    public function __construct() {
      session_start();
    }

  /**
   * @return Session
   * Return instance of Object.     
   */
    public static function getInstance() {
      if (self::$instance == null) {
        self::$instance = new self();
      }
      return self::$instance;
    }

  /**
     * @param String $key
     * @param $value
     * Create Session parameter.
     **/
    public static function set($key, $value) {
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
        session_unset();
        $_SESSION = array();
        session_destroy();
    }

    public static function clearValue($name) {
        unset($_SESSION[$name]);
    }
}