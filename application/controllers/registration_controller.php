<?php
class RegistrationController extends Controller
{
  public function index()
  {
    $login_library = $this->loader->getLibrary('login');
    $url = $this->loader->getLibrary('url');
    //проверяем залогинен ли пользователь
    if($login_library->checkLogin())
    {
      $url->redirect($this->config->common['base_url']);
    }
    $this->view->display("pages/registration", [
      'title' =>'Registration'
    ]);
  }
  
  public function register()
  {
    $login_library = $this->loader->getLibrary('login');
    $url = $this->loader->getLibrary('url');
    //проверяем залогинен ли пользователь
    if($login_library->checkLogin())
    {
      $url->redirect($this->config->common['base_url']);
    }
    //валидация
    $messages = [];
    $validation = true;
    //empty check
    $login = '';
    if(empty(IO::post('login')))
    {
        $messages[] = "Login is empty!";
        $validation = false;
    }
    $login = htmlentities((string)IO::post('login'));
    $email = '';
    if(empty(IO::post('email')))
    {
        $messages[] = "E-mail is empty!";
        $validation = false;
    }
    $email = htmlentities((string)IO::post('email'));
    $password = '';   
    if(empty(IO::post('password')))
    {
        $messages[] = "Password is empty!";
        $validation = false;
    }
    $password = htmlentities((string)IO::post('password'));   
    $confirm = ''; 
    if(empty(IO::post('confirm')))
    {
        $messages[] = "password confirmation is empty!";
        $validation = false;
    }
    $confirm = htmlentities((string)IO::post('confirm'));   
    //password length
    if($validation)
    {
         if(!preg_match('~.*@.*\..*~', $email))
         {
           $messages[] = "Wrong email!";
           $validation = false;
         }
         if(iconv_strlen($password) < 6)
         {
           $messages[] = "Password too short!";
           $validation = false;
         }
         if($password !== $confirm)
         {
           $messages[] = "Wrong password!";
           $validation = false;
         }
         if($validation)
         {
           $user_model = $this->loader->getModel('user');
           $user_id = $user_model->addUser($login, $email, $password);
           if($user_id > 0)
           {
             if($login_library->login($user_id, $login, $email))
             {
               $url->redirect($this->config->common['base_url']);
             }
           }
           $messages[] = "Error of registration!";
         }
         
    }
    $this->view->display("pages/registration", [
      'title' => 'Registration',
      'messages' => $messages
    ]); 
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