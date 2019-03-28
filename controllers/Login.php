<?php

  require_once ROOT_PATH . '/controllers/Controller.php';
  require_once ROOT_PATH . '/models/Login.php';

  $logmod = new LoginModel;

  class Login extends Controller {

    private function loginAccept($logmod) {
      $logmod->createSession();
    }

  }

  $login = new Login;
  $login->loginAccept($logmod);
  $login->CreateView('Login');
