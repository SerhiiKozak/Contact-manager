<?php

require_once ROOT_PATH . '/Library/Controller.php';
require_once ROOT_PATH . '/Library/Session.php';
require_once ROOT_PATH . '/Models/User.php';

class LoginController extends Controller {

  public function getData() {
    return '';
  }

  public function login() {
    if ($_POST['email'] == '' || $_POST['password'] == '') {
      $message = urlencode('Please enter login and password!');
      $data = ['email' => $_POST['email'], 'password' => $_POST['password']];
      $hash = base64_encode(json_encode($data));
      header('Location: index.php?controller=LoginController&action=show&hash=' . $hash . '&message=' . $message);
      exit;
    }

    $user = new User();
    $result = $user->login();
    if ($result == false) {
      $message = 'Login or password incorrect!';
      $data = ['email' => $_POST['email'], 'password' => $_POST['password']];
      $hash = base64_encode(json_encode($data));
      header('Location: index.php?controller=LoginController&action=show&hash=' . $hash . '&message=' . $message);
    } else {
      $session = Session::getInstance();
      $session->set('CONTACT_USER', $result);
      header('Location: ?controller=ListsController&action=show');
    }
  }

  public function logout() {

  }

  public function show() {
    if(!empty($_GET['hash'])) {
      $request = json_decode(base64_decode($_GET['hash']), true);
    }
    require_once ROOT_PATH . '/Views/loginView.phtml';
  }
}

