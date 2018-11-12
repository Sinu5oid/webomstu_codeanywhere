<?php
class RegistrationController extends Controller
{
  public function index()
  {
    
  }
  
  public function api_registration()
  {
    $user_model = $this->loader->getModel('user');
    $data = $this->apiData()->data;
    //проверка postData
    if(empty($data) ||
       !property_exists($data, 'email') ||
       !property_exists($data, 'login') || 
       !property_exists($data, 'password'))
    {
      echo json_encode([
        'success' => 0,
        'error' => [
          'code' => 104,
          'message' => 'Wrong data set'
        ]
      ]);
      die();
    }
    //валидация
    //login
    if(empty($data->login) || !preg_match('~[A-Za-z0-9]+~', $data->login))
    {
      echo json_encode([
        'success' => 0,
        'error' => [
          'code' => 202,
          'message' => 'Wrong user login'
        ]
      ]);
      die();
    }
    if($user_model->isLoginExists($data->login))
    {
      echo json_encode([
        'success' => 0,
        'error' => [
          'code' => 203,
          'message' => 'That login already existing'
        ]
      ]);
      die();
    }
    //email
    if(empty($data->email) || !preg_match('~.*@.*~', $data->email))
    {
      echo json_encode([
        'success' => 0,
        'error' => [
          'code' => 204,
          'message' => 'Wrong user email'
        ]
      ]);
      die();
    }
    if($user_model->isEmailExists($data->email))
    {
      echo json_encode([
        'success' => 0,
        'error' => [
          'code' => 205,
          'message' => 'Wrong user login'
        ]
      ]);
      die();
    }
    //password
    if(empty($data->password) || mb_strlen($data->password) < 8)
    {
      echo json_encode([
        'success' => 0,
        'error' => [
          'code' => 206,
          'message' => 'Wrong user password'
        ]
      ]);
      die();
    }
    $user_id = $user_model->addUser($data->login, $data->email, $data->password);
    if($user_id < 0)
    {
      echo json_encode([
        'success' => 0,
        'error' => [
          'code' => 207,
          'message' => 'Error of creating user'
        ]
      ]);
      die();
    }
    //getting token
    $session_model = $this->loader->getModel('session');
    $token = $session_model->createToken($user_id, $data->login);
    if(empty($token))
    {
      echo json_encode([
        'success' => 0,
        'error' => [
          'code' => 208,
          'message' => 'Error of creating token'
        ]
      ]);
      die();
    }
    echo json_encode([
        'success' => 1,
        'data' => [
          'token' => $token
        ]
      ]);
      die();
  }
}