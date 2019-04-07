<?php

require_once 'lib/Contact.php';

$cnt = new Contact();
$id = $_GET['id'];
$status = '2';

$cnt->deleteContact($id, $status);
require_once 'viewContacts.phtml';
