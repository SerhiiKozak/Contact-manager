<?php

require_once '/var/www/html/public/Library/Db.php';
require_once '/var/www/html/public/Library/Session.php';
require_once '/var/www/html/public/Library/User.php';

if ($_POST['login'] == '' || $_POST['password'] == '') {
  $message = 'Please enter login and password!';
  header('Location: ../index.php?&path=login&message=' . $message);
  exit;
}

$user = new User();
$user->login();