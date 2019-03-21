<?php
  require_once 'Controller.php';
  require_once (ROOT_PATH.'/models/Registration.php');

  $regmod= new RegistrationModel;

  class Registration extends Controller{

    function newUserAccept($regmod) {
      $regmod->createUser();
    }
  }
  $registration= new Registration ;
  $registration->newUserAccept($regmod);
