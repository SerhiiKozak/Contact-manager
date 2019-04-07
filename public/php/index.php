<?php

error_reporting(E_ERROR);
ini_set('display_errors','On');

require_once 'lib/Session.php';

session_start();

if ( isset($_SESSION['userId']) || !empty($_SESSION['userId'])) {
    require_once 'viewLists.phtml';
} else {
    require_once '../login.html';
}
