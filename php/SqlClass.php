<?php
class Mysql {


  public $dataSet;
  private $sqlQuery;

  protected $databaseName;
  protected $hostName;
  protected $userName;
  protected $passCode;

  function _construct(){
    $this->sqlQuery=NULL;
    $this->dataSet-NULL;

    $this->databaseName='Contacts';
    $this->hostName='localhost';
    $this->userName='root';
    $this->passCode='';
  }

  function dbConnect(){
    try{
        $con=new PDO("mysql:host=$this->$hostName;dbname=$this->$databaseName",$this->$userName,$this->$passCode);
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "its all ok";
      }
      catch(PDOException $e)
      {
        echo "Connection failed: " . $e->getMessage();
      }
  }

  function addData(){

    $firstName= $_POST['firstname'];;
    $lastName= $_POST['lastname'];;
    $login= $_POST['login'];;
    $email= $_POST['email'];;
    $password= $_POST['password'];;
    $cpassword=$_POST['cpassword'];;



    if($password==$cpassword){
    try{
      $sql="INSERT INTO `Users` (`firstname`, `lastname`, `login`, `email`, `password`)
            VALUES ('$firstName', '$lastName', '$login', '$email', '$password' );";

            $con->exec($sql);
              echo "New record created successfully";
          }
          catch(PDOException $e)
          {
          echo $sql."<br>". $e->getMessage();
          }
        }

  }

}
$connection=new Mysql();
$connection->dbConnect();
$connection->addData();
 ?>
