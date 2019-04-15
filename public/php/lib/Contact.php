<?php
// automate all functions use foreach!
require_once 'Db.php';

class Contact {

    private $db;
    public $fields = [
        'user_id' => [
            'value' => '',
            'name' => 'First Name',
            'type' => 'hidden'
        ],
        'list_id' => [
            'value' => '',
            'name' => 'First Name',
            'type' => 'hidden'
        ],
        'first_name' => [
            'rule' => '/^[a-zA-Z]+/',
            'value' => '',
            'message' => 'First name field empty or incorrect',
            'name' => 'First Name',
            'type' => 'text'
        ],
        'last_name' => [
            'rule' => '/^[a-zA-Z]+/',
            'value' => '',
            'message' => 'Last name field empty or incorrect',
            'name' => 'First Name',
            'type' => 'text'
        ],
        'email' => [
            'rule' => '/^[a-zA-z0-9_-]+@[a-zA-Z]+\.[a-zA-z]{2,}$/',
            'value' => '',
            'message' => 'E-mail field empty or incorrect',
            'name' => 'First Name',
            'type' => 'text',
            'type' => 'text'
        ],
        'home' => [
            'rule' => '/^[0-9]{6}/',
            'value' => '',
            'message' => 'Home field empty or incorrect',
            'name' => 'First Name',
            'type' => 'text'
        ],
        'work' => [
            'rule' => '/^[0-9]{6}/',
            'value' => '',
            'message' => 'Work field empty or incorrect',
            'name' => 'First Name',
            'type' => 'text'
        ],
        'cell' => [
            'rule' => '/\(?[0-9]{3}\)?([ -]?)([0-9]{3})\2([0-9]{4})/',
            'value' => '',
            'message' => 'Cell field empty or incorrect',
            'name' => 'First Name',
            'type' => 'text'
        ],
        'first_adress' => [
            'rule' => '/^[a-zA-Z]+/',
            'value' => '',
            'message' => 'First Address field empty or incorrect',
            'name' => 'First Name',
            'type' => 'text'
        ],
        'second_adress' => [
            'rule' => '/^[a-zA-Z]+/',
            'value' => '',
            'message' => 'Second Address field empty or incorrect',
            'name' => 'First Name',
            'type' => 'text'
        ],
        'city' => [
            'rule' => '/^[a-zA-Z]+/',
            'value' => '',
            'message' => 'City field empty or incorrect',
            'name' => 'First Name',
            'type' => 'text'
        ],
        'state' => [
            'rule' => '/^[a-zA-Z]+/',
            'value' => '',
            'message' => 'State field empty or incorrect',
            'name' => 'First Name',
            'type' => 'text'
        ],
        'zip' => [
            'rule' => '/^[0-9]{5}/',
            'value' => '',
            'message' => 'Zip field empty or incorrect',
            'name' => 'First Name',
            'type' => 'text'
        ],
        'country' => [
            'rule' => '/^[a-zA-Z]+/',
            'value' => '',
            'message' => 'Country field empty or incorrect',
            'name' => 'First Name',
            'type' => 'text'
        ],
        'birth_date' => [
            'rule' => '/^[0-9]{2}\.[0-2]{2}\.[0-9]{4}/',
            'value' => '',
            'message' => 'Birth date field empty or incorrect',
            'name' => 'First Name',
            'type' => 'date'
        ]
    ];

    public function __construct() {
        $this->db = new Db();
    }

    /**
     * Fill $fields array from input form.
     **/
    public function _set() {
        foreach ($this->fields as $key=>$value) {
            if(!empty($_POST[$key])) {
                $this->fields[$key]['value'] = $_POST[$key];
            } else {
                echo value['message'];
            }
            echo $value['value'];
        }
    }

    /**
     * Create new contact and write contact data to database.
     **/
    public function createContact() {
        $this->_set();
        $sql = 'INSERT INTO `Contacts` SET ';
        foreach ($this->fields as $key=>$value) {
            $sql .= '`' . $key. '`='. $this->db->createDb()->quote($value['value']). ',';
        }
        $sql = rtrim($sql,',');
        $this->db->query($sql);
    }

    /**
     * @param int $id
     * Changes status of the contact to 0.
     **/
    public function deleteContact($id) {
        $sql = 'UPDATE `Contacts` SET status=0 WHERE id='. $this->db->createDb()->quote($id);
        $this->db->query($sql);
    }

    /**
     * @param int $id
     * Modifies the entry in the database.
     **/
    public function editContact($id) {
        $this->_set();
        $sql = 'UPDATE `Contacts` SET ';
        foreach ($this->fields as $key=>$value) {
            $sql .= '`' . $key . '`=' . $this->db->createDb()->quote($value['value']). ',';
        }
        $sql = rtrim($sql, ',');
        $sql .=' WHERE id='.$id;
        $this->db->query($sql);
    }

    /**
     * @param int $id
     * @return array $result
     * Return array of contacts.
     **/
    public function getContacts($id) {
        $sql = 'SELECT id, user_id, list_id, first_name, last_name, email, home, `work`, cell, first_adress, second_adress, city, state, zip, country, birth_date, status FROM Contacts WHERE list_id='.$id;
        $result = $this->db->query($sql)->fetchAll();
        return $result;
    }

    /**
     * @param int $id
     * @return array $result
     * Return array of contact parameters.
     **/
    public function getContact($id) {
        $sql = 'SELECT user_id, list_id, first_name, last_name, email, home, `work`, cell, first_adress, second_adress, city, state, zip, country, birth_date FROM Contacts WHERE id='.$id;
        $result = $this->db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
}