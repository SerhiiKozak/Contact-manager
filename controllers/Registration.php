<?php

  require_once ROOT_PATH . '/controllers/Controller.php';
  require_once ROOT_PATH . '/models/Registration.php';

  $regmod = new RegistrationModel;

  class Registration extends Controller{

    private function newUserAccept($regmod) {
      $regmod->createUser();
    }
  }

  $registration = new Registration ;
  $registration->newUserAccept($regmod);
  $registration->CreateView('Registration');
