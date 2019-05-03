<?php

require_once 'lib/Session.php';

if(empty(Session::get('CONTACT_USER'))) {
  header('Location: index.php');
}

require_once  'lib/Contact.php';

$contactId = $_POST['contact_id'];
$id = $_POST['list_id'];
try {
  $contact = new Contact();
  $contact->_validate();
  $contact->editContact($contactId);
  header('Location: showContacts.php?list_id='.$id);
} catch (ValidateExceptions $e) {
  header('Location: showContact.php?action=edit&contact_id='.$contactId.'&id='.$id.'&message='.$e->getMessage());
}
