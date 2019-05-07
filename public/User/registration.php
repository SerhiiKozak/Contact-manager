<?php

require_once '/var/www/html/public/Library/Session.php';
require_once '/var/www/html/public/Library/User.php';

$session = new Session();
$user = new User();
$message = $user->checkForm();

if (!empty($message)) {
  $formData = ['first' => $_POST['firstName'], 'last' => $_POST['lastName'], 'login' => $_POST['login']];
  $hash = base64_encode(json_encode($formData));
  header('Location: ../index.php?path=registration&message=' . $message . '&hash=' .$hash);
  exit;
}

$userData = $user->createUser();
$session->set('CONTACT_USER', $userData);
header('Location: ../index.php?path=viewLists');




