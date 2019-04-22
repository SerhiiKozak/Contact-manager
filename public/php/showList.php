<?php

require_once 'lib/Session.php';
if(empty(Session::get('CONTACT_USER'))) {
  header('Location: index.php');
}
$id=$_GET['id'];

require_once 'viewList.phtml';
