<?php

require_once 'Log.php';
require_once 'Query.php';

class SqlClass {

  private $databaseName;
  private $hostName;
  private $userName;
  private $passCode;

  private function __construct() {
    $confpath=ROOT_PATH. '/lib/config.json';
    $jsonconfig=file_get_contents($confpath);
    $config=json_decode($jsonconfig, true);

    $this->databaseName = $config["dbName"];
    $this->hostName = $config["hostName"];
    $this->userName = $config["userName"];
    $this->passCode = $config["passCode"];
  }

   protected function dbConnect() {
    try {
        $db = new PDO('mysql:host=' . $this->$hostName . ';dbname=' . $this->$databaseName, $this->$userName , $this->$passCode);
        $db->serAttribute(PDO::ATTR_EMULATE_PREPARES, fals);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      } catch(PDOException $e) {
        Log::writeLog('error', $e->getMessage());
      }
      return $db;
  }

}
