<?php

require_once 'lib/Session.php';

if(empty(Session::get('CONTACT_USER'))) {
  header('Location: index.php');
}

require_once 'lib/ListContacts.php';

$ls = new ListContacts();
$listName = trim($_POST['listName']);
if (!empty($listName)) {
  if ($ls->listExist($listName) == false) {
    $ls->createList();
  } else {
    $message = 'List with this name already exist!';
    header('Location: index.php?message='.$message);
  }
} else {
  $message = 'Enter list name!';
  header('Location: index.php?message='.$message);
}

require_once 'viewLists.phtml';