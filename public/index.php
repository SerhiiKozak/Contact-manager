<?php

define('ROOT_PATH', dirname( __DIR__));
define('LIB_PATH', ROOT_PATH . '/lib');
require_once ROOT_PATH . '/Routes.php';

Routes::set($_SESSION); // $_SESSION property empty
