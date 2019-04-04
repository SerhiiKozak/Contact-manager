<?php

require_once 'lib/Session.php';
require_once 'lib/Ls.php';

$session = new Session();
$ls = new ls();

require_once '../lists.html';

$lists = $ls->getLists();
$idlist = $ls->getListsId();
echo '<table>';
for ($i=0; $i < sizeof($lists); $i++) {
    echo '<tr id=' . $idlist[$i] . '>';
    echo '<td>';
    echo '<a href="viewContacts.php">' . $lists[$i] .'</a>';
    echo '</td>';
    echo '<td>';
    echo '<a href="editList.php">Edit</a>';
    echo '  ';
    echo '<a href="deleteList.php">Delete</a>';
    echo '</td>';
    echo '</td>';
}
echo '</<table>';
