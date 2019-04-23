<?php

require_once 'lib/Session.php';

Session::destroy();
if(empty(Session::get('CONTACT_USER'))) {
  header('Location: index.php');
}