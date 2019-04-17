<?php
try {
  if(empty($_SESSION['CONTACTS_USER'])) {
    new Exception('User do not logged!');
  }
  $id=$_GET['id'];

  require_once 'viewList.phtml';
} catch( Exception $e) {
    header('Location: index.php');
}

