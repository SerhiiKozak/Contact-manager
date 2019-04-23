<?php

require_once 'lib/Session.php';

if(empty(Session::get('CONTACT_USER'))) {
  header('Location: index.php');
}

require_once  'lib/Contact.php';

$contactId = $_GET['contact_id'];
$id = $_GET['id'];
$contact = new Contact();
$message = $contact->_set();
if ($message == '') {
  $contact->editContact($contactId);
  header('Location: showContacts.php?id='.$id);
}else {
  header('Location: showContact.php?action=edit&contact_id='.$contactId.'&id='.$id.'&message='.$message);
}