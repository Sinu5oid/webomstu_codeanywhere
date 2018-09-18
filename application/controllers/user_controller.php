<?php
class UserController extends Controller
{
  public function index()
  {
    $user_model = $this->loader->getModel('user');
    $users = $user_model->getUsers();
    echo '<h1>Users</h1>';
    foreach($users as $user)
    {
        echo '<h2>User '.$user['id'].'</h2>';
        echo '<h3>'.$user['login'].'</h3>';
        echo '<h3>'.$user['password'].'</h3>';
        echo '<hr>';  
    }
  }
}