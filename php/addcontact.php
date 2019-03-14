<?php
  include_once "dbconnect.php";

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
          $con->exec($sql);
          echo "New record created successfully";
      }
      catch(PDOException $e)
      {
      echo $sql."<br>". $e->getMessage();
      }

?>
