<?php


  session_start();

  class Controller {

      public static function CreateView($viewName) {
        include_once ROOT_PATH . '/views/Header.php';
        include_once ROOT_PATH . '/views/' . $viewName . '.php';
      }


  }
