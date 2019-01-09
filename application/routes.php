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
  //Departments
  $router->route('departments', 'departments');
  $router->route('departments/create', 'departments/create', 'get');
  $router->route('departments/create', 'departments/create_post', 'post');
  $router->route('departments/edit/[0-9]+', 'departments/edit', 'get');
  $router->route('departments/edit/[0-9]+', 'departments/edit_post', 'post');
  $router->route('departments/delete/[0-9]+', 'departments/delete', 'get');
  $router->route('departments/delete/[0-9]+', 'departments/delete_post', 'post');
  $router->route('departments/details/[0-9]+', 'departments/details');
