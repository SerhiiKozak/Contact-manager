<?php
// remove status, made in delete in Class del status=0

error_reporting(E_ERROR);
ini_set('display_errors','On');

try {
  require_once 'lib/Session.php';

  if(empty(Session::get('CONTACT_USER'))) {
    new Exception('User do not logged!');
  }

  require_once 'lib/ListContacts.php';

  $ls = new ListContacts();
  $id = $_GET['id'];

  $ls->deleteList($id);
  echo 'List have been deleted.';
  include_once 'viewLists.phtml';
} catch(Exception $e) {
  header('Location: index.php');
}
