<?php

define('ROOT_PARH',dirname(__DIR__));

class Db {

  private $hostName;
  private $dbName;
  private $userName;
  private $pass;

  public function __construct() {
    $this->hostName = 'localhost';
    $this->dbName   = 'ContactsManager';
    $this->userName = 'root';
    $this->pass     = '';
  }

  public function CreateDb() {
    try {
      $con = new PDO('mysql:host=' . $this->hostName . '; dbname=' . $this->dbName, $this->userName, $this->pass);
      $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
      echo 'Connection failed' . $e->getMessage();
    }
    return $con;
  }

  public function query($sql) {
    $con = $this->CreateDb();
    $valuesArray = array('login'=>$_POST['login']);
    $stmt = $con->prepare($sql);
    $stmt->execute($valuesArray);
    return $stmt;
  }

}
