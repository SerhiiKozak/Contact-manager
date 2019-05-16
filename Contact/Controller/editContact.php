<?php

require_once ROOT_PATH . '/Library/Session.php';

if(empty(Session::getInstance()->get('CONTACT_USER'))) {
  header('Location: index.php');
}

require_once ROOT_PATH . '/Contact/Model/Contact.php';

$contactId = $_POST['contact_id'];
$id = $_POST['list_id'];
try {
  $contact = new Contact();
  $contact->validate();
  $contact->editContact($contactId);
  header('Location: index.php?path=ContactsController&list_id=' . $id);
} catch (ValidateExceptions $e) {
  header('Location: index.php?path=ContactController&action=edit&contact_id=' . $contactId . '&id=' . $id . '& message=' . $e->getMessage());
}
