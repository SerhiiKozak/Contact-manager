<?php
require_once 'model.php';

class RegistrationModel extends Model
{
    public function createUser(){

      $firstName= $_POST['firstname'];;
      $lastName= $_POST['lastname'];;
      $login= $_POST['login'];;
      $email= $_POST['email'];;
      $password= $_POST['password'];;
      $cpassword=$_POST['cpassword'];;

      if($password==$cpassword){
        $sql="INSERT INTO `Users` (`firstname`, `lastname`, `login`, `email`, `password`)
              VALUES ('$firstName', '$lastName', '$login', '$email', '$password' );";
              Model::createConnect($sql);
      }
      
    }

}