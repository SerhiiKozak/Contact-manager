<?php

require_once ROOT_PATH . '/Library/Session.php';

Session::destroy();
if (empty(Session::get('CONTACT_USER'))) {
  header('Location: index.php');
}