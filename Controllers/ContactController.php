<?php

require_once ROOT_PATH . '/Library/Controller.php';
require_once ROOT_PATH . '/Models/Contact.php';
require_once ROOT_PATH . '/Library/Session.php';

class ContactController extends Controller {

  public function getData() {
    $contact = new Contact();
    $fields = $contact->getFields();
    $user = Session::getInstance()->get('CONTACT_USER');
    $id = $_GET['contact_id'];

    if (!empty($id)) {
      $result = $contact->getContact ($id);
      foreach ($fields as $key => $value) {
        $fields[$key]['value'] = $result[$key];
      }
    } else {
      $fields['user_id']['value'] = $user['id'];
      $fields['list_id']['value'] = $_GET['id'];
      $result = Session::getInstance()->get('fields');
      foreach ($fields as $key => $value) {
        if (!empty($result)){
          $fields[$key]['value'] = $result[$key];
        }
      }
    }
    return $fields;
  }

  public function add() {
    $session = Session::getInstance();
    $contact = new Contact();
    $id = $_POST['list_id'];
    $contact->set($_POST);
    try {
      $contact->validate();
      $contact->createContact();
      //$session->clearValue('fields');
      header('Location: index.php?controller=ContactsController&action=show&list_id=' . $id);
    } catch (ValidateExceptions $e) {
      if (!empty(Session::getInstance()->get('fields'))) {
        Session::getInstance()->clearValue('fields');
      }
      $session->set('fields', $contact->getValues());
      header('Location: index.php?controller=ContactController&action=show&view=add&id=' . $id . '&message=' . $e->getMessage());
    }
  }

  public function edit() {
    $contactId = $_POST['contact_id'];
    $id = $_POST['list_id'];
    try {
      $contact = new Contact();
      $contact->validate();
      $contact->editContact($contactId);
      header('Location: index.php?controller=ContactsController&action=show&list_id=' . $id);
    } catch (ValidateExceptions $e) {
      header('Location: index.php?controller=ContactController&action=show&view=edit&contact_id=' . $contactId . '&id=' . $id . '& message=' . $e->getMessage());
    }

  }

  public function delete() {
    $contact = new Contact();
    $id = $_GET['id'];
    $list_id = $_GET['list_id'];

    $contact->deleteContact($id);
    header('Location: index.php?controller=ContactsController&action=show&list_id=' . $list_id);
  }

  public function show() {
    $fields = $this->request;
    require_once ROOT_PATH . '/Views/contactView.phtml';
  }
}
