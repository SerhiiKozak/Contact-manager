<?php

require_once 'lib/Session.php';

Session::destroy();
$data = Session::get('CONTACT_USER');
if(empty(Session::get('CONTACT_USER'))) {
  header('Location: index.php');
}

print_r($data);