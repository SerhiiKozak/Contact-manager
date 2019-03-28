<?php

  class Routes {

    public function set($session) {
      $request = $session['PHP_SELF'];
      list(,$constr, $action) = explode('/', $request);
      require_once ROOT_PATH . '/controllers/'.ucfirst($constr);
    }
  }
