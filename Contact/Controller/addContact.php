<?php

require_once ROOT_PATH . '/Library/Session.php';

$session = Session::getInstance();
if (empty($session->get('CONTACT_USER'))) {
  header('Location: index.php');
}

require_once ROOT_PATH . '/Contact/Model/Contact.php';
$contact = new Contact();
$id = $_POST['list_id'];
$contact->set($_POST);
try {
  $contact->validate();
  $contact->createContact();
  $session->clearValue('fields');
  header('Location: index.php?path=ContactsController&list_id=' . $id);
} catch (ValidateExceptions $e) {
  if (!empty(Session::getInstance()->get('fields'))) {
    Session::getInstance()->clearValue('fields');
  }
  $session->set('fields', $contact->getValues());
  header('Location: index.php?path=ContactController&action=add&id=' . $id . '&message=' . $e->getMessage());
}