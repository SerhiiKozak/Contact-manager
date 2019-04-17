<?php

error_reporting(E_ERROR);
ini_set('display_errors','On');

try {
  if(empty($_SESSION['CONTACT_USER'])) {
    new Exception('User do not logged!');
  }
  require_once 'viewContacts.phtml';
} catch(Exception $e) {
  header('Location: index.php');
}

