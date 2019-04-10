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

$firstName    = $_POST['newFirstName'];
$lastName     = $_POST['newLastName'];
$email        = $_POST['newEmail'];
$home         = $_POST['newHome'];
$work         = $_POST['newWork'];
$cell         = $_POST['newCell'];
$firstAdress  = $_POST['newFirstAdress'];
$secondAdress = $_POST['newSecondAdress'];
$city         = $_POST['newCity'];
$state        = $_POST['newState'];
$zip          = $_POST['newZip'];
$country      = $_POST['newCountry'];
$birthday     = $_POST['newBirthday'];

if (preg_match($regexp, $firstName) && preg_match($regexp, $lastName)) {
    if (preg_match($emailexp, $email)) {
        if (preg_match($phonexp, $home) && preg_match($phonexp, $work) && preg_match($cellexp, $cell)) {
            if (preg_match($regexp, $firstAdress) && preg_match($regexp, $secondAdress)) {
                if ( preg_match($regexp, $city) && preg_match($regexp, $state) && preg_match($zipexp, $zip) && preg_match($regexp,$country)) {
                    if (preg_match($datexp, $birthday)) {
                        $cnt = new Contact();
                        $cnt->editContact($id, $firstAdress, $lastName, $email, $home, $work, $cell, $firstAdress, $secondAdress, $city, $state, $zip, $country, $birthday);
                        echo $id;
                    } else {
                        echo 'Birth date field are empty or have wrong format.';
                    }
                } else {
                    echo 'The following fields (City, State, Zip, Country) may be empty or have wrong format.';
                }
            } else {
                echo 'Address fields are empty or have wrong format.';
            }
        }else{
            echo 'The following fields (Home, Work, Cell) may be empty or have wrong format.';
        }
    } else {
        echo 'Email field are empty or have wrong format.';
    }

} else {
    echo 'First or last name fields are empry or have wrong format.';
}


