<?php

class Routes {

  public function set($session) {
    $request = $session['REQUEST_URI'];
    list(,$constr, $action) = explode('/', $request);
    require_once ROOT_PATH . '/controllers/'.ucfirst($constr) . '.php';
  }
}
