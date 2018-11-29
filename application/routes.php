<?php
  //загрузка роутера
  $router = Router::getInstance();
  //список роутов
  $router->route('', 'base');
  //LoginController
  $router->route('login', 'login', 'get');
  $router->route('login', 'login/login', 'post');
  $router->route('logout', 'login/logout');
  //RegistrationController
  $router->route('registration', 'registration', 'get');
  $router->route('registration', 'registration/register', 'post');
  $router->route('user', 'user');
  //api
  $router->route('api/login', 'login/api_login', 'post');
  $router->route('api/logout', 'login/api_logout', 'post');
  $router->route('api/registration', 'registration/api_registration', 'post');
  $router->route('api/user', 'user/api_user', 'post');

