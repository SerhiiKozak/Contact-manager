<?php

error_reporting(E_ERROR);
ini_set('display_errors','On');

require_once 'lib/ListContacts.php';
require_once  'lib/Session.php';

$listId = $_GET['id'];
$name = $_POST['newListName'];
$ls = new ListContacts();
echo $_SESSION['listId'];
//if($ls->listExist($name) == false) {
    $ls ->editList($listId, $name);
    echo 'List have been edited';
/*} else {
    echo 'Current name already used';
}*/


