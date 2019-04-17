<?php

require_once 'Db.php';

class   ListContacts extends Db {
    private $name   = NULL;
    private $userId = NULL;

    public function __construct() {
      parent::__construct();

        $this->name = $_POST['listName'];
        $this->userId = $_SESSION['CONTACT_USER']['id'];
    }

    /**
     * Crete list and send data to database
     **/
    public function createList() {
        $sql = "INSERT INTO `Contacts_list` (`list_name`, `user_id`) VALUES ('$this->name', '$this->userId')";
        $this->query($sql);
    }

    /**
     * @return array $result
     * Get array of list objects.
     **/
    public function getLists($id) {
        $sql = 'SELECT id, user_id, list_name, status FROM Contacts_list WHERE user_id =' . $id;
        $result = $this->query($sql)->fetchAll();
        return $result;
    }

    /**
     * @param int $id
     * @param String $name
     * Changes the current list name to the specified one.
     **/
    public function editList($id, $name) {
        $sql = 'UPDATE Contacts_list SET list_name='.$this->con->quote($name).' WHERE id='.$id;
        $this->query($sql);
    }

    /**
     * @param int $id
     * Changes list status to 0.
     **/
    public function deleteList($id) {
        $sql = 'UPDATE Contacts_list SET status=0 WHERE id='.$id;
        $this->query($sql);
        // TODO add delete function contact which exist in list
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