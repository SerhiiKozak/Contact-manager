<?php

require_once 'lib/Session.php';

if(empty(Session::get('CONTACT_USER'))) {
  header('Location: index.php');
}

require_once 'lib/Contact.php';

$contact = new Contact();
$id = $_GET['id'];
$contact->_set();
$message = $contact->_set();
if ($message == '')
{
  $contact->createContact();
  header('Location: showContacts.php?id='.$id);
} else {
  header('Location: showContact.php?action=add&id='.$id.'&message='.$message);
}
