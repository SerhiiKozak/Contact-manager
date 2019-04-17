<?php

error_reporting(E_ERROR);
ini_set('display_errors','On');

try {
  if(empty($_SESSION['CONTACT_USER'])) {
    new Exception('User do not logged!');
  }
  require_once 'lib/ListContacts.php';
  session_start();

  $ls = new ListContacts();
  $listName = trim($_POST['listName']);
  if (!empty($listName)) {
      if ($ls->listExist($listName) == false) {
          $ls->createList();
      } else {
          echo 'List with this name already exist!';
      }
  } else {
      echo 'Enter list name!';
  }

  require_once 'viewLists.phtml';
} catch(Exception $e) {
  header('Location: index.php');
}