<?php

error_reporting(E_ERROR);
ini_set('display_errors','On');

require_once 'lib/Session.php';

session_start();


require_once 'viewContacts.phtml';
