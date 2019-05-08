<?php
define('ROOT_PATH', __DIR__);
require_once ROOT_PATH . '/Library/Session.php';

$userData = Session::get('CONTACT_USER');

switch ($_GET['path']) {
  case 'login' :
    echo $_GET['message'];
    require_once ROOT_PATH . '/User/login.phtml';
    break;
  case 'autentificate' :
    require_once ROOT_PATH . '/User/login.php';
    break;
  case 'logout' :
    require_once ROOT_PATH . '/User/logout.php';
    break;
  case 'registration' :
    require_once ROOT_PATH . '/User/registration.phtml';
    break;
  case  'registrate' :
    require_once ROOT_PATH . '/User/registration.php';
    break;
  case 'viewLists' :
    require_once  ROOT_PATH . '/List/viewLists.phtml';
    break;
  case 'showList' :
    require_once ROOT_PATH . '/List/viewList.phtml';
    break;
  case 'editList' :
    require_once ROOT_PATH . '/List/editList.php';
    break;
  case 'addList' :
    require_once ROOT_PATH . '/List/addList.php';
    break;
  case 'deleteList' :
    require_once ROOT_PATH . '/List/deleteList.php';
    break;
  case 'viewContacts' :
    require_once ROOT_PATH . '/Contact/viewContacts.phtml';
    break;
  case 'createForm' :
    require_once ROOT_PATH . '/Contact/createForm.phtml';
    break;
  case 'addContact' :
    require_once ROOT_PATH . '/Contact/addContact.php';
    break;
  case 'editContact' :
    require_once ROOT_PATH . '/Contact/editContact.php';
    break;
  case 'deleteContact' :
    require_once ROOT_PATH . '/Contact/deleteContact.php';
    break;
  default :
    require_once 'index.html';
}



/*if ( !isset($userData) || empty($userData)) {
    echo $_GET['message'];
    require_once 'login.html';
} else {
    echo $_GET['message'];
    require_once 'List/viewLists.phtml';
}*/