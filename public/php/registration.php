<?php

error_reporting(E_ALL);
ini_set('display_errors','On');

require_once 'lib/Db.php';
require_once 'lib/Session.php';

$db = new Db;
$session = new Session();

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
      require_once 'registration.php';
      break;
    } else {
      $userExist = false;
    }
  }
  if ($password == $cpassword) {
    if ($userExist == false) {
      $sql = "INSERT INTO `Users` (`first_name`, `last_name`, `email`, `password`)
        VALUES ('$firstName', '$lastName', '$email', '$password')";
      $db->query($sql);
      $sql = "SELECT id FROM Users WHERE email=" . $db->quote($email);
      $result = $db-> query($sql)->fetchAll(PDO::FETCH_ASSOC);
      $data = $result[0];
      $userId = $data['id'];
      $userData = array('id' => $userId, 'fName' => $firstName, 'lName' => $lastName, 'email' => $email);
      $session->set('CONTACT_USER', $userData);
      echo 'Registration success!';
      header('Location: index.php');
      }

  } else {
      echo 'Passwords do not match!';
      require_once 'registration.php';
  }
} else {
  require_once 'registration.php';
  echo 'Pls fill all fields';
}
