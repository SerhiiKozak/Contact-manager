<?php
define('ROOT_PATH', __DIR__);
$path = $_GET['path'];
switch ($path) {
  case 'LoginController' :
    require_once ROOT_PATH . '/User/Controller/' . $path . '.php';
    break;
  case 'login' :
    require_once ROOT_PATH . '/User/Controller/' . $path . '.php';
    break;
  case 'logout' :
    require_once ROOT_PATH . '/User/Controller/' . $path . '.php';
    break;
  case 'RegistrationController' :
    require_once ROOT_PATH . '/User/Controller/' . $path . '.php';
    break;
  case  'registration' :
    require_once ROOT_PATH . '/User/Controller/' . $path . '.php';
    break;
  case 'ListsController' :
    require_once ROOT_PATH . '/List/Controller/' . $path . '.php';
    break;
  case 'ListController' :
    require_once ROOT_PATH . '/List/Controller/' . $path . '.php';
    break;
  case 'editList' :
    require_once ROOT_PATH . '/List/Controller/' . $path . '.php';
    break;
  case 'addList' :
    require_once ROOT_PATH . '/List/Controller/' . $path . '.php';
    break;
  case 'deleteList' :
    require_once ROOT_PATH . '/List/Controller/' . $path . '.php';
    break;
  case 'ContactsController' :
    require_once ROOT_PATH . '/Contact/Controller/' . $path . '.php';
    break;
  case 'ContactController' :
    require_once ROOT_PATH . '/Contact/Controller/' . $path . '.php';
    break;
  case 'addContact' :
    require_once ROOT_PATH . '/Contact/Controller/' . $path . '.php';
    break;
  case 'editContact' :
    require_once ROOT_PATH . '/Contact/Controller/' . $path . '.php';
    break;
  case 'deleteContact' :
    require_once ROOT_PATH . '/Contact/Controller/' . $path . '.php';
    break;
  default :
    require_once 'main.html';
}