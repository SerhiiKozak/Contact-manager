<?php

require_once 'lib/Session.php';

if(empty(Session::get('CONTACT_USER'))) {
  header('Location: index.php');
}

require_once 'lib/Contact.php';
$contact = new Contact();
$id = $_POST['list_id'];
$contact->_set();
try {
  $contact->_validate();
  $contact->createContact();
  unset($_SESSION['fields']);
  header('Location: showContacts.php?list_id='.$id);
} catch (ValidateExceptions $e) {
  $_SESSION['fields'] = $contact->getValues();
  header('Location: showContact.php?action=add&id='.$id.'&message='.$e->getMessage());
}
