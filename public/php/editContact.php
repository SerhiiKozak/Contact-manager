<?php

error_reporting(E_ERROR);
ini_set('display_errors','On');

require_once  'lib/Contact.php';
require_once  'lib/Session.php';

$regexp = '/^[a-zA-Z]+/';
$emailexp = '/^[a-zA-z0-9_-]+@[a-zA-Z]+\.[a-zA-z]{2,}$/';
$cellexp = '/\(?[0-9]{3}\)?([ -]?)([0-9]{3})\2([0-9]{4})/';
$phonexp = '/^[0-9]{6}/';
$datexp = '/^[0-9]{2}\.[0-2]{2}\.[0-9]{4}/';
$zipexp = '/^[0-9]{5}/';

$id = $_GET['id'];

if (preg_match($regexp, $_POST['newFirstName']) && preg_match($regexp, $_POST['newLastName']) && preg_match($emailexp, $_POST['newEmail']) &&
    preg_match($phonexp, $_POST['newHome']) && preg_match($phonexp, $_POST['newWork']) && preg_match($cellexp, $_POST['newCell']) &&
    preg_match($regexp, $_POST['newFirstAdress']) && preg_match($regexp, $_POST['newSecondAdress']) && preg_match($regexp, $_POST['newCity']) &&
    preg_match($regexp, $_POST['newState']) && preg_match($zipexp, $_POST['newZip']) && preg_match($regexp, $_POST['newCountry']) && preg_match($datexp, $_POST['newBirthday'])){

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
    $cnt->editContact($id, $firstAdress, $lastName, $email, $home, $work, $cell, $firstAdress, $secondAdress, $city, $state, $zip, $country, $birthday);
    echo $id;
} else {
    echo 'Some fields are empty or have wrong format.';
}
