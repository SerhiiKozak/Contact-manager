<?php

require_once ('public/lib/Route.php');
require_once ('public/controllers/Index.php');
require_once ('public/controllers/Login.php');
require_once ('public/controllers/Registration.php');
require_once ('public/controllers/Event.php');

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
