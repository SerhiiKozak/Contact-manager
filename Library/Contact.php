<?php

require_once 'Db.php';
require_once 'Person.php';

class Contact extends Person {

    protected $fields = [
        'user_id' => [
            'rule' => '/^[0-9]{1,9}$/',
            'value' => '',
            'name' => '',
            'type' => 'hidden'
        ],
        'list_id' => [
            'rule' => '/^[0-9]{1,9}$/',
            'value' => '',
            'name' => '',
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
            'name' => 'Last Name',
            'type' => 'text'
        ],
        'email' => [
            'rule' => '/^[a-zA-z0-9_-]+@[a-zA-Z]+\.[a-zA-z]{2,}$/',
            'value' => '',
            'message' => 'E-mail field empty or incorrect',
            'name' => 'E-mail',
            'type' => 'text',
            'type' => 'text'
        ],
        'home' => [
            'rule' => '/^[0-9]{6}$/',
            'value' => '',
            'message' => 'Home field empty or incorrect',
            'name' => 'Home',
            'type' => 'text'
        ],
        'work' => [
            'rule' => '/^[0-9]{6}$/',
            'value' => '',
            'message' => 'Work field empty or incorrect',
            'name' => 'Work',
            'type' => 'text'
        ],
        'cell' => [
            'rule' => '/^(\(?[0-9]{3}\)?([ -]?)([0-9]{3})([ -]?)([0-9]{4}))$/',
            'value' => '',
            'message' => 'Cell field empty or incorrect',
            'name' => 'Cell',
            'type' => 'text'
        ],
        'first_adress' => [
            'rule' => '/^[a-zA-Z]+/',
            'value' => '',
            'message' => 'First Address field empty or incorrect',
            'name' => 'First Address',
            'type' => 'text'
        ],
        'second_adress' => [
            'rule' => '/^[a-zA-Z]+/',
            'value' => '',
            'message' => 'Second Address field empty or incorrect',
            'name' => 'Second Address',
            'type' => 'text'
        ],
        'city' => [
            'rule' => '/^[a-zA-Z]+/',
            'value' => '',
            'message' => 'City field empty or incorrect',
            'name' => 'City',
            'type' => 'text'
        ],
        'state' => [
            'rule' => '/^[a-zA-Z]+/',
            'value' => '',
            'message' => 'State field empty or incorrect',
            'name' => 'State',
            'type' => 'text'
        ],
        'zip' => [
            'rule' => '/^[0-9]{5}/',
            'value' => '',
            'message' => 'Zip field empty or incorrect',
            'name' => 'Zip',
            'type' => 'text'
        ],
        'country' => [
            'rule' => '/^[a-zA-Z]+/',
            'value' => '',
            'message' => 'Country field empty or incorrect',
            'name' => 'Country',
            'type' => 'text'
        ],
        'birth_date' => [
            'rule' => '/^\d{4}\-(0?[1-9]|1[012])\-(0?[1-9]|[12][0-9]|3[01])$/',
            'value' => '',
            'message' => 'Birth date field empty or incorrect',
            'name' => 'Birth Date',
            'type' => 'date'
        ],
        'create_at' => [
            'rule' => '/^\d{4}\-(0?[1-9]|1[012])\-(0?[1-9]|[12][0-9]|3[01]) \d{2}:\d{2}:\d{2}$/',
            'value' =>'',
            'type' => 'hidden'
        ],
        'edit_at' => [
            'rule' => '/^\d{4}\-(0?[1-9]|1[012])\-(0?[1-9]|[12][0-9]|3[01]) \d{2}:\d{2}:\d{2}$/',
            'value' =>'',
            'type' => 'hidden'
        ]
    ];

    private $con = null;

    public function __construct() {
      $this->con = Db::getInstance()->getPDO();
    }

  /**
     * Fill $fields array from input form.
     **/
    public function set($values) {

        foreach ($this->fields as $key => $value) {
          if (isset($this->fields[$key]['rule']) ) {
            $this->fields[$key]['value'] = $values[$key];
          }
        }
      if (empty($this->fields['create_at']['value'])) {
        $this->fields['create_at']['value'] = date('Y-m-d H:i:s');
      }
      $this->fields['edit_at']['value'] = date('Y-m-d H:i:s');
    }

  /**
   * @throws ValidateExceptions
   * Check fields for correct format if fields was empty or incorrect throw exception.
   */
    public function validate() {
      foreach ($this->fields as $key => $value) {
        if (isset($this->fields[$key]['rule']) && isset($this->fields[$key]['message'])) {
          if (empty($_POST[$key]) || !preg_match($this->fields[$key]['rule'], $_POST[$key])) {
            require_once ROOT_PATH . '/Exceptions/ValidateExceptions.php';
            throw new ValidateExceptions($this->fields[$key]['message']);
          }
        }
      }
    }

  /**
   * @return array
   * Create and return associative array.
   */
    public function getValues() {
      $result = [];
      foreach ($this->fields as $key => $value) {
        $result[$key] = $value['value'];
      }
      return $result;
    }

    /**
     * Create new contact and write contact data to database.
     **/
    public function createContact() {
      if ($this->message == '') {
          $sql = 'INSERT INTO `Contacts` SET ';
          foreach ($this->fields as $key=>$value) {
            $sql .= '`' . $key. '`=' . $this->con->quote($value['value']) . ',';
          }
          $sql = rtrim($sql,',');
          $this->con->query($sql);
        }
    }

    /**
     * @param int $id
     * Changes status of the contact to 0.
     **/
    public function deleteContact($id) {
        $this->con->query("
                UPDATE 
                  `Contacts` 
                SET 
                  status = 0, 
                  edit_at = ".$this->con->quote(date('Y-m-d H:i:s'))." 
                WHERE 
                  id = " . (int)$id);
    }

    /**
     * @param int $id
     * Modifies the entry in the database.
     **/
    public function editContact($id) {
        $this->set($_POST);
        $sql = 'UPDATE `Contacts` SET ';
        foreach ($this->fields as $key=>$value) {
            $sql .= '`' . $key . '`=' . $this->con->quote($value['value']). ',';
        }
        $sql = rtrim($sql, ',');
        $sql .= ' WHERE id=' . (int)$id;
        $this->con->query($sql);
    }

    /**
     * @param int $id
     * @return array $result
     * Return array of contacts.
     **/
    public function getContacts($id) {
        $result = $this->con->query("
            SELECT 
              * 
            FROM 
              Contacts 
            WHERE 
              list_id = " . (int)$id)->fetchAll();
        return $result;
    }

    /**
     * @param int $id
     * @return array $result
     * Return array of contact parameters.
     **/
    public function getContact($id) {
        $result = $this->con->query("
            SELECT 
              * 
            FROM 
              Contacts 
            WHERE 
              id = " . (int)$id)->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

  /**
   * @return array
   * Return array of fields.
   */
    public function getFields() {
      return $this->fields;
    }
}