<?php

require_once 'Db.php';

class Contact {

    protected $db;
    public $firstName;
    public $lastName;
    public $email;
    public $home;
    public $work;
    public $cell;
    public $firstAdress;
    public $secondAdress;
    public $city;
    public $state;
    public $zip;
    public $country;
    public $birthday;
    public $userId;
    public $listId;


    public function __construct() {
        $this->db           = new Db();
        $this->firstName    = $_POST['firstName'];
        $this->lastName     = $_POST['lastName'];
        $this->email        = $_POST['email'];
        $this->home         = $_POST['home'];
        $this->work         = $_POST['work'];
        $this->cell         = $_POST['cell'];
        $this->firstAdress  = $_POST['firstAdress'];
        $this->secondAdress = $_POST['secondAdress'];
        $this->city         = $_POST['city'];
        $this->state        = $_POST['state'];
        $this->zip          = $_POST['zip'];
        $this->country      = $_POST['country'];
        $this->birthday     = $_POST['birthday'];
        $this->userId       = $_SESSION['userId'];
        $this->listId       = $_SESSION['listId'];
    }

    public function createContact() {
        $sql = "INSERT INTO `Contacts` (`user_id`, `list_id`, `first_name`, `last_name`, `email`, `home`, `work`, `cell`, `first_adress`, `second_adress`, `city`, `state`, `zip`, `country`, `birth_date` )
                VALUES ('$this->userId', '$this->listId', '$this->firstName', '$this->lastName', '$this->email', '$this->home', '$this->work', '$this->cell', '$this->firstAdress', '$this->secondAdress', '$this->city','$this->state','$this->zip', '$this->country', '$this->birthday')";
        $this->db->query($sql);
    }

    public function deleteContact($id, $status) {
        $sql = 'UPDATE Contacts SET status='.$status.' WHERE id='.$id;
        $this->db->query($sql);
    }

    public function editContact($id, $firstName, $lastName, $email, $home, $work, $cell, $firstAdress, $secondAdress, $city, $state, $zip, $country, $birthday ) {
        $sql = 'UPDATE Contacts SET first_name='.$firstName.' last_name='.$lastName.' email='.$email.' home='.$home.' $work='.$work.' cell='.$cell.' first_adress='.$firstAdress.' second_adress'.$secondAdress.' city='.$city.' state='.$state.' zip='.$zip.' $country='.$country.' birth_date='.$birthday.' WHERE id='.$id;
        $this->db->query($sql);
    }

    public function getContacts($id) {
        $sql = 'SELECT id, user_id, list_id, first_name, last_name, email, home, `work`, cell, first_adress, second_adress, city, state, zip, country, birth_date, status FROM Contacts WHERE list_id='.$id;
        $result = $this->db->query($sql)->fetchAll();
        return $result;
    }



}