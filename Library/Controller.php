<?php

abstract class Controller {
  protected $data = null;
  abstract public function __construct();
  abstract public function getData();
  abstract public function returnPage();
}