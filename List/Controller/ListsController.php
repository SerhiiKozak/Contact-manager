<?php

require_once ROOT_PATH . '/Library/Controller.php';
require_once ROOT_PATH . '/Library/Session.php';
require_once ROOT_PATH . '/List/Model/ListContacts.php';

class ListsController extends Controller {
  public function __construct() {
    $this->data = $this->getData();
  }

  public function getData() {
    $userData = Session::getInstance()->get('CONTACT_USER');
    $ls = new ListContacts();

    if (empty(Session::getInstance()->get('CONTACT_USER'))) {
      header('Location: index.php');
    }
    else {
      return $ls->getLists($userData['id']);
    }

  }

  public function returnPage() {
    $lists = $this->data;
    require_once ROOT_PATH . '/List/View/listsView.phtml';
  }
}

$listsController = new ListsController();
$listsController->returnPage();