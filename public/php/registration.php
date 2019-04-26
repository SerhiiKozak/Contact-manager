<?php

require_once 'lib/Session.php';
require_once 'lib/User.php';

$session = new Session();
$user = new User();
$message = $user->checkForm();

if (!empty($message)) {
  header('Location: ../registrationForm.php?message=' . $message);
  exit;
}

$userData = $user->createUser();
$session->set('CONTACT_USER', $userData);
header('Location: index.php');




