<?php

require_once ROOT_PATH . '/Library/Session.php';

if (empty(Session::get('CONTACT_USER'))) {
  header('Location: index.php');
}

require_once ROOT_PATH . '/Library/Contact.php';
$contact = new Contact();
$id = $_POST['list_id'];
$contact->set();
try {
  $contact->validate();
  $contact->createContact();
  unset($_SESSION['fields']);
  header('Location: index.php?path=viewContacts&list_id=' . $id);
} catch (ValidateExceptions $e) {
  $_SESSION['fields'] = $contact->getValues();
  header('Location: index.php?path=createForm&action=add&id=' . $id . '&message=' . $e->getMessage());
}