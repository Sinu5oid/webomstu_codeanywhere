<?php
class BaseController extends Controller
{
  public function index()
  {
      $login_library = $this->loader->getLibrary('login');
      if($login_library->checkLogin())
      {
        $this->view->display('pages/base', [
          'login_flag' => true,
          'title' => 'title',
          'heading' => 'Heading'
        ]);
      }
      else
      {
        $url = $this->loader->getLibrary('url');
        $url->redirect($this->config->common['base_url'].'login');
      }
      
  } 
}