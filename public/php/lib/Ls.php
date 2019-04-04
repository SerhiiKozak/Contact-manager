<?php

require_once 'Db.php';

class ls {
    public $name   = NULL;
    public $userId = NULL;
    public $db;

    public function __construct()
    {
        $this->name = $_POST['listName'];
        $this->userId = $_SESSION['userId'];
    }

    public function createConnect($sql) {
        $this->db = new Db();
        return $this->db->query($sql);
    }

    public function createList() {
        $sql = "INSERT INTO `Contacts_list` (`list_name`, `user_id`) VALUES ('$this->name', '$this->userId')";
        $this->createConnect($sql);
    }

    public function checkUser() {

    }

    public function getLists() {
        $sql = 'SELECT id, user_id, list_name FROM Contacts_list WHERE user_id =' . $this->userId;
        $result = $this->createConnect($sql);
        $lists = array();
        foreach ($result as $row => $data) {
            $lists[] = $data['list_name'];
        }
        return $lists;
    }

    public function getListsId() {
        $sql = 'SELECT id FROM Contacts_list WHERE user_id =' . $this->userId;
        $result = $this->createConnect($sql);
        $idlist = array();
        foreach ($result as $row => $data) {
            $idlist[] = $data['id'];
        }
        return $idlist;
    }


    public function editList($id, $name) {
        $sql = 'UPDATE Contacts_list SET list_name='.$name.'WHERE id='.$id;
        $this->createConnect($sql);
    }

    public function listExist($name) {

        $lists = $this->getLists();
        for ($i = 0; $i <= sizeof($lists); $i++ ) {
            if ($lists[$i] == $name) {
                return true;
                break;
            } else {
                return false;
            }
        }
    }
}