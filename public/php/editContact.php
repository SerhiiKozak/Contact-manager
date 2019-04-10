<?php

error_reporting(E_ERROR);
ini_set('display_errors','On');

try{
    require_once  'lib/Contact.php';
    require_once  'lib/Session.php';

    $fields = [
        'newFirstName' => [
            'rule' => '/^[a-zA-Z]+/',
            'value' => ''
        ],
        'newLastName' => [
            'rule' => '/^[a-zA-Z]+/',
            'value' => ''
        ],
        'newEmail' => [
            'rule' => '/^[a-zA-z0-9_-]+@[a-zA-Z]+\.[a-zA-z]{2,}$/',
            'value' => ''
        ],
        'newHome' => [
            'rule' => '/^[0-9]{6}/',
            'value' => ''
        ],
        'newWork' => [
            'rule' => '/^[0-9]{6}/',
            'value' => ''
        ],
        'newCell' => [
            'rule' => '/\(?[0-9]{3}\)?([ -]?)([0-9]{3})\2([0-9]{4})/',
            'value' => ''
        ],
        'newFirstAdress' => [
            'rule' => '/^[a-zA-Z]+/',
            'value' => ''
        ],
        'newSecondAdress' => [
            'rule' => '/^[a-zA-Z]+/',
            'value' => ''
        ],
        'newCity' => [
            'rule' => '/^[a-zA-Z]+/',
            'value' => ''
        ],
        'newState' => [
            'rule' => '/^[a-zA-Z]+/',
            'value' => ''
        ],
        'newZip' => [
            'rule' => '/^[0-9]{5}/',
            'value' => ''
        ],
        'newCountry' => [
            'rule' => '/^[a-zA-Z]+/',
            'value' => ''
        ],
        'newBirthday' => [
            'rule' => '/^[0-9]{2}\.[0-2]{2}\.[0-9]{4}/',
            'value' => ''
        ],
    ];

    $id = $_GET['id'];

    foreach ($fields as $field => &$flag) {
        if (isset($_POST[$field])) {
            if (preg_match(flag['rule'], $_POST[$field])) {
                $flag['value'] = $_POST['$field'];
            } else {
                throw new Exception('Field'.$field.'is incorrect');
            }
        }
    }
    $contact = new Contact();
    $contact->editContact($id,$fields);
} catch (Exception $e) {
    echo $e->getMessage();
}




