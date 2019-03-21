<?php

require_once (LIB_PATH.'/Route.php');
require_once (ROOT_PATH.'/controllers/Index.php');
require_once (ROOT_PATH.'/controllers/Login.php');
require_once (ROOT_PATH.'/controllers/Registration.php');
require_once (ROOT_PATH.'/controllers/Event.php');

Route::set('index.php', function() {
      Index::CreateView('Index');
});
Route::set('login.php', function() {
      Login::CreateView('Login');
});
Route::set('registration.php', function() {
      Registration::CreateView('Registration');
});
Route::set('event.php', function() {
      Event::CreateView('Event');
});
