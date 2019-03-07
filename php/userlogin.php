<?php
include_once "dbconnect.php";


$userlogin=$_POST['login'];
$userpassword=$_POST['password'];
try{
   $sql="SELECT login, password FROM Users WHERE login='$userlogin'";
    $query=$con->prepare($sql);
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


?>
