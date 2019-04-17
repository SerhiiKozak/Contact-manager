<?php

error_reporting(E_ERROR);
ini_set('display_errors','On');
try {
  if(empty($_SESSION['CONTACT_USER'])) {
    new Exception('User do not logged!');
  }
  session_start();
  require_once 'lib/Contact.php';

  $contact = new Contact();
  $contact->createContact();
  foreach ($contact->fields as $key=>$value) {

      echo $value['value'];
  }
} catch(Exception $e) {
  header('Location: index.php');
}
