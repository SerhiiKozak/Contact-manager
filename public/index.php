<?php

require_once '/var/www/html/Library/Session.php';

$userData = Session::getInstance()->get('CONTACT_USER');
require_once '../Router.php';
