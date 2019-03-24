<?php

require_once (LIB_PATH.'/SqlClass.php');

  class Model {

    private function query($con, $sql) {
      $valuesArray = array('userlogin' =>$_POST['login'] , );
      $stmt = $con->prepare($sql);
      try {
        $con->execute($valuesArray);
      } catch(PDOException $e) {
        Log::writeLog('error', $e->getMessage());
      }
    }

    public function createConnect($query) {
      $con = $sqlClass->dbConnect();
      $this->query($con, $query);
    }

  }
