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

if (preg_match($regexp, $_POST['newFirstName']) && preg_match($regexp, $_POST['newLastName'])) {
    if (preg_match($emailexp, $_POST['newEmail'])) {
        if (preg_match($phonexp, $_POST['newHome']) && preg_match($phonexp, $_POST['newWork']) && preg_match($cellexp, $_POST['newCell'])) {
            if (preg_match($regexp, $_POST['newFirstAdress']) && preg_match($regexp, $_POST['newSecondAdress'])) {
                if ( preg_match($regexp, $_POST['newCity']) && preg_match($regexp, $_POST['newState') && preg_match($zipexp, $_POST['newZip']) && preg_match($regexp,$_POST['newCountry'])) {
                    if (preg_match($datexp, $_POST['newBirthday'])) {
                        $cnt = new Contact();
                        $cnt->editContact($id, $_POST['newFirstName'], $_POST['newLastName'], $_POST['newEmail'], $_POST['newHome'], $_POST['newWork'], $_POST['newCell'],
                            $_POST['newFirstAdress'], $_POST['newSecondAdress'], $_POST['newCity'], $_POST['newState'], $_POST['newZip'], $_POST['newCountry'], $_POST['newBirthday']);
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


