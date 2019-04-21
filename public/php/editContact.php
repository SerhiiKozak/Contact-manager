<?php

require_once 'lib/Session.php';

if(empty(Session::get('CONTACT_USER'))) {
  header('Location: index.php');
}

require_once  'lib/Contact.php';

$id = $_GET['id'];
$contact = new Contact();
$contact->editContact($id);
echo 'Contact have been edited.';
require_once 'viewContacts.phtml';

