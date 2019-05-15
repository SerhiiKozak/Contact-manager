<?php

require_once ROOT_PATH . '/Library/Controller.php';
require_once ROOT_PATH . '/Contact/Model/Contact.php';
require_once ROOT_PATH . '/Library/Session.php';

class ContactController extends Controller {
  public function __construct() {
    $this->data = $this->getData();
  }

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

  public function returnPage() {
    $fields = $this->data;
    require_once ROOT_PATH . '/Contact/View/contactView.phtml';
  }
}
$contactController = new ContactController();
$contactController->returnPage();
