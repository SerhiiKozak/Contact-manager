<?php

error_reporting(E_ERROR);
ini_set('display_errors','On');

require_once 'lib/Session.php';
require_once 'lib/Ls.php';

$session = new Session();
$ls = new ls();
$listName = $_POST['listName'];
if ($listName != '') {
    if ($ls->listExist($listName) == false) {
        $ls->createList();
    } else {
        echo 'List with this name already exist!';
    }
} else {
    echo 'Enter list name!';
}

require_once 'viewLists.php';
