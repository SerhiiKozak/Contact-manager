<?php

require_once 'Db.php';

class   ListContacts {
    private $name   = NULL;
    private $userId = NULL;
    private $db;

    public function __construct() {
        $this->name = $_POST['listName'];
        $this->userId = $_SESSION['userId'];
        $this->db = new Db();
    }


    public function createList() {
        $sql = "INSERT INTO `Contacts_list` (`list_name`, `user_id`) VALUES ('$this->name', '$this->userId')";
        $this->db->query($sql);
    }

    public function getLists() {
        $sql = 'SELECT id, user_id, list_name, status FROM Contacts_list WHERE user_id =' . $this->userId;
        $result = $this->db->query($sql)->fetchAll();
        return $result;
    }

    public function editList($id, $name) {
        $sql = 'UPDATE Contacts_list SET list_name='.$name.' WHERE id='.$id;
        $this->db->query($sql);
    }

    public function deleteList($id, $status) {
        $sql = 'UPDATE Contacts_list SET status='.$status.' WHERE id='.$id;
        $this->db->query($sql);
    }

    public function listExist($name) {

        $lists = $this->getLists();
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