<?php

error_reporting(E_ERROR);
ini_set('display_errors','On');

require_once  'lib/Ls.php';
require_once  'lib/Session.php';

Session::set('listId', '');
Session::set('listId', $_GET['id']);

$listId =$_SESSION['listId'];

$cnt = new Contact();
$cnt->editContact($listId);
echo $_SESSION['listId'];