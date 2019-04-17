<?php

error_reporting(E_ERROR);
ini_set('display_errors','On');

try {
  require_once 'lib/Session.php';

  if(empty(Session::get('CONTACT_USER'))) {
    new Exception('User do not logged!');
  }

  require_once 'lib/Contact.php';

  $contact = new Contact();
  $contact->createContact();

  foreach ($contact->fields as $key=>$value) {

      echo $value['value'];
  }
} catch(Exception $e) {
  header('Location: index.php');
}
