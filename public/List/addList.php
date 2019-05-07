<?php

require_once ROOT_PATH . '/Library/Session.php';

if(empty(Session::get('CONTACT_USER'))) {
  header('Location: index.php');
}

require_once ROOT_PATH . '/Library/ListContacts.php';

$ls = new ListContacts();
$listName = trim($_POST['listName']);
if (!empty($listName)) {
  if ($ls->listExist($listName) == false) {
    $ls->createList();
  } else {
    $message = 'List with this name already exist!';
    header('Location: index.php?path=viewLists&message=' . $message);
  }
} else {
  $message = 'Enter list name!';
  header('Location: index.php?path=viewLists&message=' . $message);
}

header('Location: index.php?path=viewLists');