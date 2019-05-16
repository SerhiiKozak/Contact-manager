<?php

require_once ROOT_PATH . '/Library/Session.php';

if(empty(Session::getInstance()->get('CONTACT_USER'))) {
  header('Location: index.php');
}

require_once ROOT_PATH . '/List/Model/ListContacts.php';

$ls = new ListContacts();
$id = $_GET['id'];

$ls->deleteList($id);
$message = 'List has been deleted.';
header('Location: index.php?path=ListsController&message=' . urlencode($message));