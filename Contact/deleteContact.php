<?php

require_once ROOT_PATH . '/Library/Session.php';

if (empty(Session::getInstance()->get('CONTACT_USER'))) {
  header('Location: index.php');
}

require_once ROOT_PATH . '/Library/Contact.php';

$contact = new Contact();
$id = $_GET['id'];
$list_id = $_GET['list_id'];

$contact->deleteContact($id);
header('Location: index.php?path=viewContacts&list_id=' . $list_id);