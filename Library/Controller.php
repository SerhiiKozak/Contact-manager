<?php

require_once ROOT_PATH . '/Library/Session.php';

abstract class Controller {
  protected $request = null;

  /**
   * @var Session
   */
  protected $session = null;

  public function __construct() {
    $this->request = $this->getData();
    $this->session = Session::getInstance();
  }
  protected function isAuterized() {
    return empty($this->session->get('CONTACT_USER'));
  }
  public function getData() {}
  public function show() {}
}