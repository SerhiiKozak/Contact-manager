<?php

error_reporting(E_ERROR);
ini_set('display_errors','On');
try {
  require_once 'lib/ListContacts.php';
  require_once  'lib/Session.php';
  if(empty($_SESSION['CONTACTS_USER'])) {
    new Exception('User do not logged!');
  }
  $listId = $_GET['id'];
  $name = $_POST['newListName'];
  $ls = new ListContacts();
  echo $_SESSION['listId'];
  $ls ->editList($listId, $name);
  echo 'List have been edited';

} catch(Exception $e) {
  header('Location: index.php');
}




