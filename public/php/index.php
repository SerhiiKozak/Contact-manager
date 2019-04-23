<?php

require_once 'lib/Session.php';

$userData = Session::get('CONTACT_USER');

if ( !isset($userData) || empty($userData)) {
    echo $_GET['message'];
    require_once '../login.html';
} else {
    echo $_GET['message'];
    require_once 'viewLists.phtml';
}