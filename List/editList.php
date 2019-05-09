<?php

require_once ROOT_PATH . '/Library/ListContacts.php';
require_once ROOT_PATH . '/Library/Session.php';

if (empty(Session::get('CONTACT_USER'))) {
  header('Location: index.php');
}

$listId = $_GET['id'];
$name = $_POST['newListName'];
$ls = new ListContacts();

if (!$ls->listExist($name)) {
  $ls ->editList($listId, $name);
  header('Location: index.php?path=viewLists');
} else {
  header('Location: index.php?path=editList&message='.urlencode( 'with this name already exist'));
}