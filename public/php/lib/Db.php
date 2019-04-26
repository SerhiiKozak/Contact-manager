<?php

class Db {

  private $hostName;
  private $dbName;
  private $userName;
  private $pass;
  protected $con;

  public function __construct() {
    $this->hostName = 'localhost';
    $this->dbName   = 'ContactsManager';
    $this->userName = 'root';
    $this->pass     = '';
    $this->con      = $this->createConnect();
  }

    /**
     * Create database connection.
     **/
  private function createConnect() {
      $con = new PDO('mysql:host=' . $this->hostName .
                    '; dbname=' . $this->dbName,
                     $this->userName,
                     $this->pass);
      $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      return $con;
  }

    /**
     * Send query to database.
     **/
  public function query($sql) {
    $stmt = $this->con->prepare($sql);
    $stmt->execute();
    return $stmt;
  }

  public function quote($value) {
    return $this->con->quote($value);
  }

  public function getPDO() {
    return $this->con;
  }
}