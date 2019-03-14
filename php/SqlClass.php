<?php
class Mysql {

  private $databaseName;
  private $hostName;
  private $userName;
  private $passCode;

  function _construct(){

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
      return $con;
  }

  function addUser($con){

    $db=$con;
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

            $db->exec($sql);
              echo "New record created successfully";
          }
          catch(PDOException $e)
          {
          echo $sql."<br>". $e->getMessage();
          }
        }
      }

  function addContact($con){

    $db=$con;
    $firstName=$_POST['firstname'];
    $lastName=$_POST['lastname'];
    $email=$_POST['email'];
    $home=$_POST['home'];
    $work=$_POST['work'];
    $cell=$_POST['cell'];
    $firtAdress=$_POST['firstadress'];
    $secondAdress=$_POST['secondadress'];
    $city=$_POST['city'];
    $state=$_POST['zip'];
    $country=$_POST['country'];
    $userid=1;

    try{
      $sql="INSERT INTO `contact` (`firstname`,`lastname`,`email`,`home`,`work`,`cell`,`firstadress`,`secondadress`,`city`,`state`,`zip`,`country`,`userid`)
            VALUES ('$firstName','$lastName','$email','$home','$work','$cell','$firtAdress','$secondAdress','$city','$state','$zip','$country','$userid');";
            $db->exec($sql);
            echo "New record created successfully";
        }
        catch(PDOException $e)
        {
        echo $sql."<br>". $e->getMessage();
        }
  }

  function getUserData($con){

    $db=$con;
    $userlogin=$_POST['login'];
    $userpassword=$_POST['password'];

    try{
       $sql="SELECT login, password FROM Users WHERE login='$userlogin'";
        $query=$db->prepare($sql);
        $query->execute();
        $result=$query->fetchAll(\PDO::FETCH_ASSOC);
        $data=$result['0'];

        $dblogin=$data['login'];
        $dbpassword=$data['password'];
      }
      catch(PDOException $e)
      {
        echo $sql."<br>". $e->getMessage();
      }
      if($userlogin==$dblogin&&$userpassword==$dbpassword)
      {
        include"../index.php";
      }
  }

}
$mySql=new Mysql();
$conn=$mySql->dbConnect();
$MySql->addUser($conn);
 ?>
