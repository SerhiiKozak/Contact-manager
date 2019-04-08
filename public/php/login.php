<?php

error_reporting(E_ERROR);
ini_set('display_errors','On');
require_once 'lib/Db.php';
require_once  'lib/Session.php';


if ($_POST['login']!='' && $_POST['password']!='') {
  $db = new Db;

  $login = $_POST['login'];
  $password = $_POST['password'];

  $sql = 'SELECT id, email, password FROM Users WHERE email = :login';
  $result = $db-> query($sql)->fetchAll(PDO::FETCH_ASSOC);
  $data = $result[0];
  $dbemail = $data['email'];
  $dbpass = $data['password'];
  $userid = $data['id'];

  if ($login == $dbemail && $password == $dbpass) {
    $session = new Session();
    $session->set('userLogin', $login);
    $session->set('userId', $userid);
    include_once 'viewLists.phtml';
  } else {
    echo 'Login or password incorrect!';
    require_once '../login.html';
  }

} else {
  echo 'Pls enter login and password!';
  require_once '../login.html';
}


