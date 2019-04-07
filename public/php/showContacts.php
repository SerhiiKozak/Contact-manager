<?php

require_once 'lib/Session.php';

session_start();
Session::set('listId', '');
Session::set('listId', $_GET['id']);

require_once 'viewContacts.phtml';
echo $_SESSION['listId'];