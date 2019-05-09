<?php

require_once ROOT_PATH . '/Library/Db.php';
require_once ROOT_PATH . '/Library/User.php';

if ($_POST['email'] == '' || $_POST['password'] == '') {
  $message = 'Please enter login and password!';
  $data = ['email' => $_POST['email'], 'password' => $_POST['password']];
  $hash = base64_encode(json_encode($data));
  header('Location: ../index.php?&path=login&hash=' . $hash . '&message=' . $message);
  exit;
}

$user = new User();
$user->login();