<?php
define('ROOT_PATH', __DIR__);

switch ($_GET['path']) {
  case 'login' :
    require_once ROOT_PATH . '/User/Controller/LoginController.php';
    break;
  case 'autentificate' :
    require_once ROOT_PATH . '/User/Controller/login.php';
    break;
  case 'logout' :
    require_once ROOT_PATH . '/User/Controller/logout.php';
    break;
  case 'registration' :
    require_once ROOT_PATH . '/User/Controller/RegistrationController.php';
    break;
  case  'registrate' :
    require_once ROOT_PATH . '/User/Controller/registration.php';
    break;
  case 'viewLists' :
    require_once ROOT_PATH . '/List/Controller/ListsController.php';
    break;
  case 'showList' :
    require_once ROOT_PATH . '/List/Controller/ListController.php';
    break;
  case 'editList' :
    require_once ROOT_PATH . '/List/Controller/editList.php';
    break;
  case 'addList' :
    require_once ROOT_PATH . '/List/Controller/addList.php';
    break;
  case 'deleteList' :
    require_once ROOT_PATH . '/List/Controller/deleteList.php';
    break;
  case 'viewContacts' :
    require_once ROOT_PATH . '/Contact/Controller/ContactsController.php';
    break;
  case 'createForm' :
    require_once ROOT_PATH . '/Contact/Controller/ContactController.php';
    break;
  case 'addContact' :
    require_once ROOT_PATH . '/Contact/Controller/addContact.php';
    break;
  case 'editContact' :
    require_once ROOT_PATH . '/Contact/Controller/editContact.php';
    break;
  case 'deleteContact' :
    require_once ROOT_PATH . '/Contact/Controller/deleteContact.php';
    break;
  default :
    require_once 'main.html';
}