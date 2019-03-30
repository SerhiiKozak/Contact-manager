<?php

error_reporting(E_ALL);
ini_set('display_errors','On');

require_once 'Db.php';

$db = new Db;

if ($_POST['firstName']!='' && $_POST['lastName']!='' && $_POST['login']!='' && $_POST['password']!='' && $_POST['cpassword']!='') {

  $firstName = $_POST['firstName'];
  $lastName  = $_POST['lastName'];
  $email     = $_POST['login'];
  $password  = $_POST['password'];
  $cpassword = $_POST['cpassword'];


  $sql = 'SELECT email FROM Users';
  $result = $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);



  foreach ($result as $row => $data) {
    if ($data['email'] == $email) {
      $userExist = true;
      echo 'User already exists!';
      break;
    } else {
      $userExist = false;
    }
  }
  if ($password == $cpassword && $userExist == false) {
    $sql = "INSERT INTO `Users` (`firstname`, `lastname`, `email`, `password`)
           VALUES ('$firstName', '$lastName', '$email', '$password')";
    $db->query($sql);
    echo 'Registration success!';
  }
} else {
  echo 'Pls fill all fields';
}
