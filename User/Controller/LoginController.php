<?php

require_once ROOT_PATH . '/Library/Controller.php';
require_once ROOT_PATH . '/Library/Session.php';
require_once ROOT_PATH . '/User/Model/User.php';

class LoginController extends Controller   {

  public function __construct() {
    $this->data = $this->getData();
  }

  public function getData() {
    return '';
  }

  public function returnPage() {
    if(!empty($_GET['hash'])) {
      $data = json_decode(base64_decode($_GET['hash']), true);
    }
    require_once ROOT_PATH . '/User/View/loginView.phtml';
  }
}

$loginController = new LoginController();
$loginController->returnPage();