<?php
class BaseController extends Controller
{
  public function index()
  {
      $this->view->display('page', [
          'title' => 'title',
          'heading' => 'Heading'
      ]);
  } 
}