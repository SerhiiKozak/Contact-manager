<?php
error_reporting(E_ERROR);
ini_set('display_errors','On');

require_once 'lib/Contact.php';

$contact = new Contact();
$id = $_GET['id'];
$status = 2;

$contact->deleteContact($id, $status);
echo 'Contact have been deleted.';
require_once 'viewContacts.phtml';
