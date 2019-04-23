<?php

require_once 'lib/Db.php';
require_once  'lib/Session.php';

if ($_POST['login']!='' && $_POST['password']!='') {
  $db = new Db;

  $login = $_POST['login'];
  $password = $_POST['password'];

  $sql = 'SELECT * FROM Users WHERE email = '.$db->quote($login);
  $result = $db-> query($sql)->fetchAll(PDO::FETCH_ASSOC);
  $data = $result[0];
  $dbEmail = $data['email'];
  $dbPass = $data['password'];
  $dbFirstName = $data['first_name'];
  $dbLastName = $data['last_name'];
  $userId = $data['id'];
  $userData = array('id' => $userId, 'fName' => $dbFirstName, 'lName' => $dbLastName, 'email' => $dbEmail);

  if ($login == $dbEmail && $password == $dbPass) {
    $session = new Session();
    $session->set('CONTACT_USER', $userData);
    header('Location: index.php');
  } else {
    $message = 'Login or password incorrect!';
    header('Location: index.php?message='.$message);
  }

} else {
  $message = 'Please enter login and password!';
  header('Location: index.php?message='.$message);
}