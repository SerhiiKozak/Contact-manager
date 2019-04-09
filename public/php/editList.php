<?php

error_reporting(E_ERROR);
ini_set('display_errors','On');

require_once  'lib/Ls.php';
require_once  'lib/Session.php';

Session::set('listId', '');
Session::set('listId', $_GET['id']);
$listId = $_SESSION['listId'];
$name = $_POST['newListName'];
$ls = new ListContacts();
echo $_SESSION['listId'];
//if($ls->listExist($name) == false) {
    $ls ->editList($listId, $name);
    echo 'List have been edited';
/*} else {
    echo 'Current name already used';
}*/


