<?php

require_once 'lib/Session.php';

if(empty(Session::get('CONTACT_USER'))) {
  header('Location: index.php');
}

require_once 'lib/ListContacts.php';

$ls = new ListContacts();
$id = $_GET['id'];

$ls->deleteList($id);
echo 'List have been deleted.';
include_once 'viewLists.phtml';
