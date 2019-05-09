<?php

abstract class Person {

  protected $fields = [
    'first_name' => '',
    'last_name' => '',
    'email' => '',
  ];

  abstract function set($values);
}