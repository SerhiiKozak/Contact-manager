<?php

error_reporting(E_ERROR);
ini_set('display_errors','On');

require_once 'lib/Session.php';

$userId = Session::get('userId');

if ( !isset($userId) || empty($userId)) {
    require_once '../login.html';
    echo $userId;
} else {
    require_once 'viewLists.phtml';
}
