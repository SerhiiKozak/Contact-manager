<?php

require_once ROOT_PATH . '/List/Model/ListContacts.php';
require_once ROOT_PATH . '/Library/Session.php';

if (empty(Session::getInstance()->get('CONTACT_USER'))) {
  header('Location: index.php');
}

$listId = $_GET['id'];
$name = $_POST['newListName'];
$ls = new ListContacts();

if (!$ls->listExist($name)) {
  $ls ->editList($listId, $name);
  header('Location: index.php?path=ListsController');
} else {
  header('Location: index.php?path=ListController&message='.urlencode( 'with this name already exist'));
}