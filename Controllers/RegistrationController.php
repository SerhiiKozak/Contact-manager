<?php

require_once ROOT_PATH . '/Library/Controller.php';
require_once ROOT_PATH . '/Library/Session.php';
require_once ROOT_PATH . '/Models/User.php';

class registrationController extends Controller {

  public function registrate() {
    $user = new User();
    $user->set($_POST);
    $message = $user->checkForm();

    if (!empty($message)) {
      $formData = ['first' => $_POST['first_name'], 'last' => $_POST['last_name'], 'email' => $_POST['email']];
      $hash = base64_encode(json_encode($formData));
      header('Location: index.php?controller=RegistrationController&action=show&message=' . $message . '&hash=' .$hash);
      exit;
    }

    $userData = $user->createUser();
    Session::getInstance()->set('CONTACT_USER', $userData);
    header('Location: index.php?controller=ListsController&action=show');
  }

  public function show() {
    if (!empty($_GET['hash'])) {
      $request = json_decode(base64_decode($_GET['hash']), true);
    }
    require_once ROOT_PATH . '/Views/registrationView.phtml';
  }

}
