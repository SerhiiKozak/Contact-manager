<?php

require_once ROOT_PATH . '/Library/Db.php';
require_once ROOT_PATH . '/Library/Session.php';
require_once ROOT_PATH . '/Library/User.php';

if ($_POST['login'] == '' || $_POST['password'] == '') {
  $message = 'Please enter login and password!';
  header('Location: ../index.php?&path=login&message=' . $message);
  exit;
}

$user = new User();
$user->login();