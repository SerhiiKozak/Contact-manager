<?php

require_once ROOT_PATH . '/Library/Session.php';
require_once ROOT_PATH . '/Library/User.php';

$user = new User();
$user->set($_POST);
$message = $user->checkForm();

if (!empty($message)) {
  $formData = ['first' => $_POST['first_name'], 'last' => $_POST['last_name'], 'email' => $_POST['email']];
  $hash = base64_encode(json_encode($formData));
  header('Location: ../index.php?path=registration&message=' . $message . '&hash=' .$hash);
  exit;
}

$userData = $user->createUser();
Session::set('CONTACT_USER', $userData);
header('Location: ../index.php?path=viewLists');




