<?php

require_once ROOT_PATH . '/Library/Controller.php';
require_once ROOT_PATH . '/Library/Session.php';
require_once ROOT_PATH . '/List/Model/ListContacts.php';

class ListController extends Controller {
  public function __construct() {
    $this->data = $this->getData();
  }

  public function getData() {
    if (empty(Session::getInstance()->get('CONTACT_USER'))) {
      header('Location: index.php');
    }
    $list = new ListContacts();
    return $list->getList($_GET['id']);
  }

  public function returnPage() {
    $listName = $this->data;
    require_once ROOT_PATH . '/List/View/listView.phtml';
  }
}
$listController = new ListController();
$listController->returnPage();