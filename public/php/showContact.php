<?php
try {
  if(empty($_SESSION['CONTACT_USER'])) {
    new Exception('User do not logged!');
  }

  require_once 'lib/Session.php';
  Session::get('listId');

  if (!empty($_SESSION['listId'])) {
      Session::set('listId','');
  }

  Session::set('listId',$_GET['id']);
  require_once 'createForm.phtml';

} catch(Exception $e) {
  header('Location: index.php');
}
