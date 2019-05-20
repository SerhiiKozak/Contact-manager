<?php

require_once ROOT_PATH . '/Library/Controller.php';
require_once ROOT_PATH . '/Library/Session.php';
require_once ROOT_PATH . '/Models/ListContacts.php';

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

  public function show() {
    $lists = $this->data;
    require_once ROOT_PATH . '/Views/listsView.phtml';
  }
}
