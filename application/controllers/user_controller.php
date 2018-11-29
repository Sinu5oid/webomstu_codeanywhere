<?php
class UserController extends Controller
{
  public function index()
  {
    $user_model = $this->loader->getModel('user');
  }
 
  public function api_user()
  {
    $token = $this->apiData(false, true)->token;
    //модель сессии
    $session_model = $this->loader->getModel('session');
    $user_model = $this->loader->getModel('user');
    $user_id = $session_model->authentication($token);
    $user = $user_model->getUserById($user_id);
    if($user_id > 0)
    {
      echo json_encode([
        'success' => 1,
        'data'    => [
          'id'        => $user['id'],
          'firesname' => $user['firstname'],
          'lastname'  => $user['lastname'],
          'birthdate' => $user['birthdate'],
          'login'     => $user['login'],
          'emai'     => $user['email']
        ]
      ]);
      die();
    }
    echo json_encode([
        'success' => 0,
        'error' => [
          'code' => 105,
          'message' => 'Wrong token'
        ]
    ]);  
    die();
  }
}