<?php

error_reporting(E_ERROR);
ini_set('display_errors','On');
require_once 'lib/Db.php';
require_once  'lib/Session.php';


if ($_POST['login']!='' && $_POST['password']!='') {
  $db = new Db;

  $login = $_POST['login'];
  $password = $_POST['password'];

  $sql = 'SELECT id, first_name, last_name, email, password FROM Users WHERE email = '.$db->quote($login);
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
    //include_once 'viewLists.phtml';
  } else {
    echo 'Login or password incorrect!';
    require_once '../login.html';
  }

} else {
  echo 'Pls enter login and password!';
  require_once '../login.html';
}


