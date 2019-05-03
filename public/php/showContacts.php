<?php

require_once 'lib/Session.php';

if(empty(Session::get('CONTACT_USER'))) {
   header('Location: index.php');
}

if (!empty(Session::get('fields'))) {
    unset($_SESSION['fields']);
}

echo $_GET['message'];
require_once 'viewContacts.phtml';