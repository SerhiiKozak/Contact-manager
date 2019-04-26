<?php

require_once 'lib/Db.php';
require_once  'lib/Session.php';

if ($_POST['login'] == '' || $_POST['password'] == '') {
  $message = 'Please enter login and password!';
  header('Location: index.php?message=' . $message);
  exit;
}

$db = new Db;

$login = $_POST['login'];
$password = $_POST['password'];


$result = $db-> query("SELECT * 
    FROM 
      Users 
    WHERE 
      email = " .$db->quote($login)
)->fetchAll(PDO::FETCH_ASSOC);

$data = $result[0];
$dbEmail = $data['email'];
$dbPass = $data['password'];
$dbFirstName = $data['first_name'];
$dbLastName = $data['last_name'];
$userId = $data['id'];
$userData = array('id' => $userId,
                  'fName' => $dbFirstName,
                  'lName' => $dbLastName,
                  'email' => $dbEmail);

if ($login != $dbEmail || !password_verify($password, $dbPass)) {
  $message = 'Login or password incorrect!';
  header('Location: index.php?message=' . $message);
  exit;
}
$session = new Session();
$session->set('CONTACT_USER', $userData);
header('Location: index.php');

