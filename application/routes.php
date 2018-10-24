<?php
  //загрузка роутера
  $router = Router::getInstance();
  //список роутов
  $router->route('', 'base');
  $router->route('user', 'user');
  $router->route('api/login', 'login/api_login', 'post');
  $router->route('api/logout', 'login/api_logout', 'post');
  $router->route('api/registration', 'registration/api_registration', 'post');
  $router->route('api/user', 'user/api_user', 'post');

