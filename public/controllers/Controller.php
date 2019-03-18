<?php
require_once '/../lib/SqlClass.php';

  public class Controller extends SqlClass {
      public static function CreateView($viewName){
        include_once "/../views/$viewName.php";
      }

  }
