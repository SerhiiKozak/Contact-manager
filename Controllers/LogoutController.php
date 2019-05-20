<?php

require_once ROOT_PATH . '/Library/Session.php';
require_once ROOT_PATH . '/Library/Controller.php';

class LogoutController extends Controller {
  public function logout() {
    Session::getInstance()->destroy();
    if ($this->isAuterized()) {
      header('Location: index.php');
    }
  }
}