<?php
class UserController extends Controller
{
  public function index()
  {
    $user_model = $this->loader->getModel('user');
   
  
//     $temp = $user_model->login('login1', 'password');
//     IO::varDump($temp);
//     $session_model = $this->loader->getModel('session');
//     $session_model->logout('7e939edd86c2200cd8b78432955fd4b6');

//     IO::varDump($session_model);
//     $temp = $session_model->login('login1', 'password');
//     IO::varDump($temp);
//     $temp = $session_model->authentication($temp);
//     IO::varDump($temp);
//     $user = $user_model->getUserById($temp);
//     IO::varDump($user);
    
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