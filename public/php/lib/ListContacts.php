<?php

require_once 'Db.php';

class   ListContacts extends Db {

    private $name   = NULL;
    private $userId = NULL;
    private $createAt = NULL;
    private $editAt = NULL;

    public function __construct() {
      parent::__construct();

        $this->name = $_POST['listName'];
        $this->userId = $_SESSION['CONTACT_USER']['id'];
    }

    /**
     * Crete list and send data to database
     **/
    public function createList() {
        $this->editAt = $this->createAt = date('Y-m-d H:i:s');
        $this->query("INSERT INTO 
                  `Contacts_list` 
                  (`list_name`, `user_id`, `create_at`, `edit_at`) 
                VALUES 
                  ('$this->name', '$this->userId', '$this->createAt', '$this->editAt')");
    }

    /**
     * @return array $result
     * Get array of list objects.
     **/
    public function getLists($id) {
        $sql = 'SELECT 
                  id, 
                  user_id, 
                  list_name, 
                  status 
                FROM Contacts_list 
                WHERE user_id =' . $this->con->quote($id);
        $result = $this->query($sql)->fetchAll();
        return $result;
    }

    /**
     * @param int $id
     * @param String $name
     * Changes the current list name to the specified one.
     **/
    public function editList($id, $name) {
        $this->editAt = date('Y-m-d H:i:s');
        $this->query( "UPDATE 
                  Contacts_list 
                SET 
                  list_name=".$this->con->quote($name).", 
                  edit_at=".$this->con->quote($this->editAt)."
                WHERE id=".$this->con->quote($id));
    }

    /**
     * @param int $id
     * Changes list status to 0.
     **/
    public function deleteList($id) {
        $this->editAt = date('Y-m-d H:i:s');
        $this->query("UPDATE 
                  Contacts_list 
                SET 
                  status=0, 
                  edit_at=".$this->con->quote($this->editAt)."
                WHERE id=".$this->con->quote($id));
    }

    /**
     * @param String $name
     * @return boolean
     * Compere new name with name's in database and return TRUE if name already exist or FALSE if not.
     **/
    public function listExist($name) {

        $lists = $this->getLists($this->userId);
        foreach ($lists as $key => $data) {
            if ($data['list_name'] == $name) {
                return true;
                break;
            } else {
                return false;
            }
        }

    }
}