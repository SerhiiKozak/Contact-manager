<?php

require_once 'lib/Session.php';

if(empty(Session::get('CONTACT_USER'))) {
  header('Location: index.php');
}

require_once 'lib/Contact.php';

$contact = new Contact();
$contact->createContact();
$id = $_GET['id'];

header('Location: showContacts.php?id='.$id);
