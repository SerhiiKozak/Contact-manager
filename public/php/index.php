<?php

require_once 'lib/Session.php';

$session = new Session();

if ( isset($_SESSION['userId']) || !empty($_SESSION['userId'])) {
    require_once 'viewLists.php';
} else {
    require_once '../login.html';
}
