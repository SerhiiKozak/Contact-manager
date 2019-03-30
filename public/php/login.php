<?php

error_reporting(E_ALL);
ini_set('display_errors','On');
require_once 'Db.php';

if ($_POST['login']!='' && $_POST['password']!='') {
  $db = new Db;

  $login = $_POST['login'];
  $password = $_POST['password'];

  $sql = 'SELECT email, password FROM Users WHERE email = :login' ;
  $result = $db-> query($sql)->fetchAll(PDO::FETCH_ASSOC);
  $data = $result[0];
  $dbemail = $data['email'];
  $dbpass = $data['password'];

  if ($login == $dbemail && $password == $dbpass) {
    echo 'Login seccess!';
  } else {
    echo 'Login or password incorrect!';
  }

} else {
  echo 'Pls enter login and password!';
}
