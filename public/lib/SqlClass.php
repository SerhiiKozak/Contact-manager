<?php
class SqlClass {

  private $databaseName;
  private $hostName;
  private $userName;
  private $passCode;

  public function __construct() {

    $this->databaseName = 'Contacts';
    $this->hostName = 'localhost';
    $this->userName = 'root';
    $this->passCode = '';
  }

   function dbConnect() {
    try {
        $con=new PDO('mysql:host='.$this->$hostName.';dbname='.$this->$databaseName , $this->$userName , $this->$passCode);
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "its all ok";
      } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
      }
      return $con;
  }

  public function query($con,$sql) {
    $con=$con;
    $sql=$sql;
    try {
      $con->exec($sql);
    } catch(PDOException $e) {
      $log='../var/log.txt.';
      file_put_contents($log, $e->getMessage(),FILE_APPEND);
    }
  }
