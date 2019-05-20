<?php

require_once ROOT_PATH . '/Library/Controller.php';
require_once ROOT_PATH . '/Library/Session.php';
require_once ROOT_PATH . '/Models/ListContacts.php';

class ListController extends Controller {

  public function getData() {
    if (empty(Session::getInstance()->get('CONTACT_USER'))) {
      header('Location: index.php');
    }
    $list = new ListContacts();
    return $list->getList($_GET['id']);
  }

  public function add() {
    if (!$this->isAuterized()) {
      $ls = new ListContacts();
      $listName = trim($_POST['listName']);
      if (!empty($listName)) {
        if ($ls->listExist($listName) == false) {
          $ls->createList();
        } else {
          $message = 'List with this name already exist!';
          header('Location: index.php?controller=ListsController&action=show&message=' . $message);
        }
      } else {
        $message = 'Enter list name!';
        header('Location: index.php?controller=ListsController&action=show&message=' . $message);
      }

      header('Location: index.php?controller=ListsController&action=show');
    }
  }

  public function delete() {
    $ls = new ListContacts();
    $id = $_GET['id'];

    $ls->deleteList($id);
    $message = 'List has been deleted.';
    header('Location: index.php?controller=ListsController&action=show&message=' . urlencode($message));
  }

  public function edit() {
    $listId = $_GET['id'];
    $name = $_POST['newListName'];
    $ls = new ListContacts();

    if (!$ls->listExist($name)) {
      $ls ->editList($listId, $name);
      header('Location: index.php?controller=ListsController&action=show');
    } else {
      header('Location: index.php?controller=ListsController&action=show&message='.urlencode( 'with this name already exist'));
    }
  }

  public function show() {
    $listName = $this->request;
    require_once ROOT_PATH . '/Views/listView.phtml';
  }
}

// Laravel