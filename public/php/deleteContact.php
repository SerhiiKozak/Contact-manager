<?php

require_once 'lib/Session.php';

if(empty(Session::get('CONTACT_USER'))) {
  header('Location: index.php');
}

require_once 'lib/Contact.php';

$contact = new Contact();
$id = $_GET['id'];
$list_id = $_GET['list_id'];

$contact->deleteContact($id);
echo 'Contact have been deleted.';
header('Location: showContacts.php?id='.$list_id);