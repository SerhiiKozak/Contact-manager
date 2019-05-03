<?php

require_once 'Db.php';
require_once 'Session.php';

class User extends Db {

  private $firstName;
  private $lastName;
  private $email;
  private $password;
  private $cpassword;

  public function __construct() {
    parent::__construct();
    $this->_set();
  }

  public function _set() {
    $this->firstName = $_POST['firstName'];
    $this->lastName = $_POST['lastName'];
    $this->email = $_POST['login'];
    $this->password = $_POST['password'];
    $this->cpassword = $_POST['cpassword'];
  }

  /**
   * @return string
   * Check if registration form filled correct if yes than return empty string if not return error message.
   */
  public function checkForm() {

    $emailExp = '/^[a-zA-z0-9_-]+@[a-zA-Z]+\.[a-zA-z]{2,}$/';

    if (trim($_POST['firstName']) == ''
      || $_POST['lastName'] == ''
      || $_POST['login'] == ''
      || $_POST['password'] == ''
      || $_POST['cpassword'] == '') {

      return $message = 'Please fill in all fields!';
    }

    if (!preg_match($emailExp, $_POST['login'])) {
      return $message = 'Invalid email!';
    }

    $result = $this->query("
      SELECT 
         email 
      FROM 
         Users
      WHERE 
         email = ".$this->quote($_POST['login'])
    )->fetchColumn();

    if ($result != false) {
    return $message = 'User already exists!';
    exit;
    }

    if ($this->password != $this->cpassword) {
      return $message = 'Passwords do not match!';
      exit;
    }
    return $message = '';
  }

  /**
   * @return array
   * Create User and return user data.
   */
  public function createUser() {
    $editAt = $createAt = date('Y-m-d H:i:s');
    $this->query("
            INSERT INTO 
              `Users`
            SET 
              `first_name` = ".$this->quote($this->firstName). " ,
              `last_name` = ".$this->quote($this->lastName). " ,
              `email` = ".$this->quote($this->email). " ,
              `password` = ".$this->quote(password_hash($this->password, PASSWORD_BCRYPT)). " ,
              `create_at` = ".$this->quote($createAt). " ,
              `edit_at` = ".$this->quote($editAt). " ,
              `status` = 1"
    );
    $userId = $this->getPDO()->lastInsertId();

    return [
      'id' => $userId,
      'fName' => $this->firstName,
      'lName' => $this->lastName,
      'email' => $this->email
    ];
  }
}