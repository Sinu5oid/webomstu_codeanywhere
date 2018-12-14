<?php
class BaseController extends Controller
{
  public function index()
  {
      $login_library = $this->loader->getLibrary('login');
      if($login_library->checkLogin())
      {
        $user = $login_library->getUser();
        $this->view->display('pages/base', [
          'login_flag'  => true,
          'user'        => $user,
          'title'       => 'Account',
          'heading'     => 'Welcome, '.ucfirst($user['login'])
        ]);
      }
      else
      {
        $url = $this->loader->getLibrary('url');
        $url->redirect($this->config->common['base_url'].'login');
      }
  } 
}