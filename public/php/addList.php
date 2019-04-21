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
    echo 'List with this name already exist!';
  }
} else {
  echo 'Enter list name!';
}

require_once 'viewLists.phtml';
