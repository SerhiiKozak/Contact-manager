<?php

require_once '/var/www/html/public/Library/Session.php';

Session::destroy();
if (empty(Session::get('CONTACT_USER'))) {
  header('Location: index.php');
}