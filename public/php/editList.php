<?php

require_once 'lib/ListContacts.php';
require_once  'lib/Session.php';

if(empty(Session::get('CONTACT_USER'))) {
  header('Location: index.php');
}

$listId = $_GET['id'];
$name = $_POST['newListName'];
$ls = new ListContacts();

if ($ls->listExist($name) == true) {
  $ls ->editList($listId, $name);
  echo 'List have been edited';
  header('Location: index.php');
} else {
  header('Location: index.php');
}

