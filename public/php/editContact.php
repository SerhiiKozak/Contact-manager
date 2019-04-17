<?php

error_reporting(E_ERROR);
ini_set('display_errors','On');
try {
  require_once 'lib/Session.php';

  if(empty(Session::get('CONTACT_USER'))) {
    new Exception('User do not logged!');
  }
  try{
      require_once  'lib/Contact.php';

      $id = $_GET['id'];
      $contact = new Contact();
      $contact->editContact($id);
      echo 'Contact have been edited.';
      require_once 'viewContacts.phtml';
  } catch (Exception $e) {
      echo $e->getMessage();
  }
} catch(Exception $e) {
  header('Location: index.php');
}
