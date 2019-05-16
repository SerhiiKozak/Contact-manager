<?php

require_once ROOT_PATH . '/Library/Controller.php';
require_once ROOT_PATH . '/Library/Session.php';
require_once ROOT_PATH . '/User/Model/User.php';

if ($_POST['email'] == '' || $_POST['password'] == '') {
  $message = urlencode('Please enter login and password!');
  $data = ['email' => $_POST['email'], 'password' => $_POST['password']];
  $hash = base64_encode(json_encode($data));
  header('Location: index.php?&path=LoginController&hash=' . $hash . '&message=' . $message);
  exit;
}

$user = new User();
$result= $user->login();
if ($result == false) {
  $message = 'Login or password incorrect!';
  $data = ['email' => $_POST['email'], 'password' => $_POST['password']];
  $hash = base64_encode(json_encode($data));
  header('Location: index.php?path=LoginController&hash=' . $hash . '&message=' . $message);
} else {
  $session = Session::getInstance();
  $session->set('CONTACT_USER', $result);
  header('Location: index.php?path=ListsController');
}