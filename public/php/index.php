<?php

require_once 'lib/Session.php';

$userData = Session::get('CONTACT_USER');

if ( !isset($userData) || empty($userData)) {
    require_once '../login.html';
} else {
    require_once 'viewLists.phtml';
}
