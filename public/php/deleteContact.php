<?php
// remove status, made in delete in Class del status=0
error_reporting(E_ERROR);
ini_set('display_errors','On');

require_once 'lib/Contact.php';

$contact = new Contact();
$id = $_GET['id'];

$contact->deleteContact($id);
echo 'Contact have been deleted.';
require_once 'viewContacts.phtml';
