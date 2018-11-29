<?php
class LoginController extends Controller
{
  public function index()
  {
    $login = $this->loader->getLibrary('login');
    //проверяем залогинен ли пользователь
    if($login->checkLogin())
    {
      $url = $this->loader->getLibrary('url');
      $url->redirect($this->config->common['base_url']);
    }
    //вывод формы авторизации
    $this->view->display('pages/login', [
      'title' => 'Login',
    ]);
  }

  public function login()
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
    //login
    $login = '';
    if(empty(IO::post('login')))
    {
      $messages[] = 'Login is empty!';
      $validation = false;
    }
    $login = htmlentities((string)IO::post('login'));
    //password
    $password = '';
    if(empty(IO::post('password')))
    {
      $messages[] = 'Password is empty!';
      $validation = false;
    }
    $password = htmlentities((string)IO::post('password'));
    //авторизация
    if($validation)
    {
      $user_model = $this->loader->getModel('user');
      $user_id = $user_model->login($login, $password);
      if($user_id > 0)
      {
        $user = $user_model->getUserById($user_id);
        if($login_library->login($user['id'], $user['login'], $user['email']))
        {
          $url->redirect($this->config->common['base_url']);
        }
        $messages[] = 'Error of login!';
      }
      else
      {
        $messages[] = 'Wrong login or password';
      }
    }
    $this->view->display('pages/login', [
        'title' => 'Login',
        'messages' => $messages
    ]);
  }

  public function logout()
  {
    $login_library = $this->loader->getLibrary('login');
    $url = $this->loader->getLibrary('url');
    //проверяем залогинен ли пользователь
    if($login_library->checkLogin())
    {
      $url->redirect($this->config->common['base_url']);
    }
    $login_library->logout();
    $url->redirect($this->config->common['base_url']);
  }
  
  /* AJAX */
  
  /* API */
  
    public function api_login()
  {
    $data = $this->apiData()->data;
        //проверка postData
    if(empty($data) || !property_exists($data, 'login') || !property_exists($data, 'password'))
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
    //модель сессии
    $session_model = $this->loader->getModel('session');
    //getting token
    $token = $session_model->login($data->login, $data->password);
    if(empty($token))
    {
      echo json_encode([
        'success' => 0,
        'error' => [
          'code' => 201,
          'message' => 'Wrong login or password'
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
  
  public function api_logout()
  {
    $token = $this->apiData(false, true)->token;
    //модель сессии
    $session_model = $this->loader->getModel('session');
    $user_id = $session_model->authentication($token);
    if($user_id > 0)
    {
      $session_model->logout($token);
      echo json_encode([
        'success' => 1
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