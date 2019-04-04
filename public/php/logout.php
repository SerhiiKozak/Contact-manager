<?php

require_once 'lib/Session.php';

$session = new Session();
$session->destroy();

require_once '../index.html';
