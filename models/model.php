<?php
require_once (LIB_PATH.'/SqlClass.php');
  class Model
  {
    public function createConnect($query) {
      $sql = $query;
      $sqlClass = new SqlClass;
      $con = $sqlClass->dbConnect();
      $sqlClass->query($con, $sql);
    }

  }
