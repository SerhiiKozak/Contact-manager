<?php

require_once ROOT_PATH . '/Library/Controller.php';
require_once ROOT_PATH . '/Library/Session.php';
require_once ROOT_PATH . '/Contact/Model/Contact.php';

class ContactsController extends Controller {
  public function __construct() {
    $this->data = $this->getData();
  }

  public function getData() {
    $session = Session::getInstance();
    if (!empty($session->get('fields'))) {
      $session->clearValue('fields');
    }
    if (empty($session->get('CONTACT_USER'))) {
      header('Location: index.php');
    } else {
      $cnt = new Contact();
      $contacts = $cnt->getContacts($_GET['list_id']);
      $fields = $cnt->getFields();
      return ['contacts' => $contacts, 'fields' => $fields];
    }
  }

  public function returnPage() {
    $contacts = $this->data['contacts'];
    $fields = $this->data['fields'];
    require_once ROOT_PATH . '/Contact/View/contactsView.phtml';
  }
}
$contactsController = new ContactsController();
$contactsController->returnPage();
