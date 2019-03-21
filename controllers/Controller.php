<?php

  require_once '../constants.php';
  require_once (ROOT_PATH.'/lib/SqlClass.php');

  session_start();

  class Controller extends SqlClass {

      public static function CreateView($viewName){
        include_once "/../views/$viewName.php";
        
      }


  }
