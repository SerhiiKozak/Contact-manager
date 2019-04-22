<?php

require_once 'lib/Session.php';
  if(empty(Session::get('CONTACT_USER'))) {
    header('Location: index.php');
  }
  require_once 'viewContacts.phtml';

