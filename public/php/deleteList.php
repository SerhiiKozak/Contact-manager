<?php

error_reporting(E_ERROR);
ini_set('display_errors','On');

require_once 'lib/Ls.php';

$ls = new ListContacts();
$id = $_GET['id'];
$status = '2';

$ls->deleteList($id, $status);
include_once 'viewLists.phtml';