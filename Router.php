<?php
define('ROOT_PATH', __DIR__);
$controller = $_GET['controller'];
$action = $_GET['action'];
if (!empty($controller) && !empty($action)) {
  require_once ROOT_PATH . '/Controllers/' . $controller . '.php';
  $loginController = new $controller();
  $loginController->$action();
} else {
  require_once ROOT_PATH . '/Views/main.html';
}
