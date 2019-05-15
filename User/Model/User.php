<?php

require_once ROOT_PATH . '/Library/Db.php';
require_once ROOT_PATH . '/Library/Person.php';

class User extends Person {

  protected $fields = [
    'first_name' => '',
    'last_name' => '',
    'email' => '',
    'password' =>'',
    'cpassword' => ''
  ];


  public function set($values) {
    foreach ($this->fields as $key => $value) {
      $this->fields[$key] = $values[$key];
    };
  }

  /**
   * @return string
   * Check if registration form filled correct if yes than return empty string if not return error message.
   */
  public function checkForm() {

    $emailExp = '/^[a-zA-z0-9_-]+@[a-zA-Z]+\.[a-zA-z]{2,}$/';

    if (trim($_POST['first_name']) == ''
      || $_POST['last_name'] == ''
      || $_POST['email'] == ''
      || $_POST['password'] == ''
      || $_POST['cpassword'] == '') {

      return  'Please fill in all fields!';
    }

    if (!preg_match($emailExp, $_POST['email'])) {
      return 'Invalid email!';
    }

    $result = Db::getInstance()->query("
      SELECT 
         email 
      FROM 
         Users
      WHERE 
         email = " . Db::getInstance()->quote($_POST['email'])
    )->fetchColumn();

    if ($result != false) {
      return 'User already exists!';
    }

    if ($this->fields['password'] != $this->fields['cpassword']) {
      return 'Passwords do not match!';
    }
    return '';
  }

  /**
   * @return array
   * Create User and return user data.
   */
  public function createUser() {
    $db = Db::getInstance();
    $editAt = $createAt = date('Y-m-d H:i:s');
    $db->query("
            INSERT INTO 
              `Users`
            SET 
              `first_name` = " . $db->quote($this->fields['first_name']) . " ,
              `last_name` = " . $db->quote($this->fields['last_name']) . " ,
              `email` = " . $db->quote($this->fields['email']) . " ,
              `password` = " . $db->quote(password_hash($this->fields['password'], PASSWORD_BCRYPT)) . " ,
              `create_at` = " . $db->quote($createAt) . " ,
              `edit_at` = " . $db->quote($editAt) . " ,
              `status` = 1"
    );
    $userId = $db->getPDO()->lastInsertId();

    return [
      'id' => $userId,
      'fName' => $this->fields['first_name'],
      'lName' => $this->fields['last_name'],
      'email' => $this->fields['email']
    ];
  }

  /**
   *
   */
  public function login() {
    $result = Db::getInstance()-> query("
    SELECT 
        * 
    FROM 
      Users 
    WHERE 
      email = " . Db::getInstance()->quote($_POST['email'])
    )->fetch(PDO::FETCH_ASSOC);

    $userData = [
      'id' => $result['id'],
      'fName' => $result['first_name'],
      'lName' => $result['last_name'],
      'email' => $result['email']];

    if ($_POST['email'] != $result['email']|| !password_verify($_POST['password'], $result['password'])) {
      return false;
    } else {
      return $userData;
    }
  }
}
// TODO group file for MVC model