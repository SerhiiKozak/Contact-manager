<?php

error_reporting(E_ERROR);
ini_set('display_errors','On');

session_start();
require_once 'lib/Contact.php';

$contact = new Contact();

$contact->createContact();