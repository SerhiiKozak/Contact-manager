<?php

require_once 'lib/Contact.php';

$cnt = new Contact();
$id = $_GET['id'];
$status = '2';

$cnt->deleteContact($id, $status);
echo 'Contact have been deleted.';
require_once 'viewContacts.phtml';
