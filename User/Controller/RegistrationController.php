<?php

require_once ROOT_PATH . '/Library/Controller.php';
require_once ROOT_PATH . '/Library/Session.php';
require_once ROOT_PATH . '/User/Model/User.php';

class registrationController extends Controller {
  public function __construct() {
    $this->data = $this->getData();
  }

  public function getData() {

  }

  public function returnPage() {
    if (!empty($_GET['hash'])) {
      $data = json_decode(base64_decode($_GET['hash']), true);
    }
    require_once ROOT_PATH . '/User/View/registrationView.phtml';
  }

}
$registrationController = new registrationController();
$registrationController->returnPage();