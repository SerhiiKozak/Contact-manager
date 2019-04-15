<?php
require_once 'lib/Session.php';
Session::get('listId');
if (!empty($_SESSION['listId'])) {
    Session::set('listId','');
}
Session::set('listId',$_GET['id']);
require_once 'createForm.phtml';