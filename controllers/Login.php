<?php

  require_once '../constants.php';
  require_once 'Controller.php';
  require_once (ROOT_PATH.'/models/Login.php');

  $logmod= new LoginModel;

  class Login extends Controller {

    function loginAccept($logmod) {
      $logmod->createSession();
    }

  }
  
  $login= new Login;
  $login->loginAccept($logmod);
