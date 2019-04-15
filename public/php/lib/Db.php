<?php
//
define('ROOT_PATH',dirname(__DIR__));

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

    /**
     * Create database connection.
     **/
  public function createDb() {
    try {
      $con = new PDO('mysql:host=' . $this->hostName . '; dbname=' . $this->dbName, $this->userName, $this->pass);
      $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
      echo 'Connection failed' . $e->getMessage();
    }
    return $con;
  }

    /**
     * Send query to database.
     **/
  public function query($sql) {
    $con = $this->createDb();
    $valuesArray = array('login'=>$_POST['login']);
    $stmt = $con->prepare($sql);
    $stmt->execute($valuesArray);
    return $stmt;
  }

}
