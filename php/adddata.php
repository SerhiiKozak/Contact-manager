<?php
include_once "dbconnect.php";





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
?>
