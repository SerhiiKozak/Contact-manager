<?php

error_reporting(E_ERROR);
ini_set('display_errors','On');

require_once 'lib/Ls.php';
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
