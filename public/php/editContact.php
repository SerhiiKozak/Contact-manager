<?php

error_reporting(E_ERROR);
ini_set('display_errors','On');

require_once  'lib/Contact.php';
require_once  'lib/Session.php';

Session::set('listId', '');
Session::set('listId', $_GET['id']);

$listId = $_SESSION['listId'];

$firstName = $_POST['newFirstName'];
$lastName = $_POST['newLastName'];
$email = $_POST['newEmail'];
$home = $_POST['newHome'];
$work = $_POST['newWork'];
$cell = $_POST['newCell'];
$firstAdress = $_POST['newFirstAdress'];
$secondAdress = $_POST['newSecondAdress'];
$city = $_POST['newCity'];
$state = $_POST['newState'];
$zip = $_POST['newZip'];
$country= $_POST['newCountry'];
$birthday = $_POST['newBirthday'];

$cnt = new Contact();
$cnt->editContact($listId, $firstAdress, $lastName, $email, $home, $work, $cell, $firstAdress, $secondAdress, $city, $state, $zip, $country, $birthday);
echo $_SESSION['listId'];