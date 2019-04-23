<?php

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
  $editAt = $createAt = date('Y-m-d H:i:s');

  $sql = 'SELECT email FROM Users';
  $result = $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);

  foreach ($result as $row => $data) {
    if ($data['email'] == $email) {
      $userExist = true;
      $message = 'User already exists!';
      header('Location: ../registrationForm.php?message='.$message);
      break;
    } else {
      $userExist = false;
    }
  }
  if ($password == $cpassword) {
    if ($userExist == false) {
      $sql = "INSERT INTO `Users` (`first_name`, `last_name`, `email`, `password`, `create_at`, `edit_at`)
        VALUES ('$firstName', '$lastName', '$email', '$password', '$createAt', '$editAt')";
      $db->query($sql);
      $sql = "SELECT id FROM Users WHERE email=" . $db->quote($email);
      $result = $db-> query($sql)->fetchAll(PDO::FETCH_ASSOC);
      $data = $result[0];
      $userId = $data['id'];
      $userData = array('id' => $userId, 'fName' => $firstName, 'lName' => $lastName, 'email' => $email);
      $session->set('CONTACT_USER', $userData);
      header('Location: index.php');
      }

  } else {
      $message = 'Passwords do not match!';
      header('Location: ../registrationForm.php?message='.$message);
  }
} else {
    $message = 'Please fill all fields!';
    header('Location: ../registrationForm.php?message='.$message);;
}
