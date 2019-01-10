<?php

class DepartmentsController extends Controller {
  
  function index() {
    $departments_model = $this->loader->getModel('departments');
    $this->view->display('pages/departments/index', [
      'title' => 'Departments',
      'data' => [
        'action' => 'index',
        'departments' => $departments_model->getDepartments(),
        'current_uri' => $_SERVER['REQUEST_URI']
      ]
    ]);
  }
  
  function create() {
    $departments_model = $this->loader->getModel('departments');
    $this->view->display('pages/departments/create_edit', [
      'title' => 'Create department',
      'data' => [
        'back_url' => "/departments",
        'action' => 'create',
        'department' => null,
      ]
    ]);
  }
  
  function create_post() {
    if (empty($_POST) || empty($_POST["dep_name"])) {
     $this->view->display("pages/error", [
        'title' => 'Error',
        'data' => [
          'back_url' => "/departments",
          'message' => 'No data in post headers passed!'
        ]
      ]);
      return;
    }
    $dep_name = htmlspecialchars($_POST["dep_name"]);
    $departments_model = $this->loader->getModel('departments');
    if($departments_model->addDepartment($dep_name) != -1) {
      $url = $this->loader->getLibrary('url');
      $url->redirect($this->config->common['base_url']."departments");
    } else {
      $this->view->display("pages/error", [
        'title' => 'Error',
        'data' => [
          'back_url' => "/departments",
          'message' => 'SQL query failed. Try with another values!'
        ]
      ]);
    }
  }
  
  function edit(int $id) {
    if (empty($id)) {
     $this->view->display("pages/error", [
        'title' => 'Error',
        'data' => [
          'back_url' => "/departments",
          'message' => 'No ID provided in query!'
        ]
      ]);
      return;
    }
    $departments_model = $this->loader->getModel('departments');
    $this->view->display('pages/departments/create_edit', [
      'title' => 'Edit department',
      'data' => [
        'action' => 'edit',
        'back_url' => "/departments",
        'department' => $departments_model->getDepartmentById($id),
      ]
    ]);
  }
  
  function edit_post(int $id) {
    if (empty($_POST) || empty($_POST["dep_name"])) {
      $this->view->display("pages/error", [
        'title' => 'Error',
        'data' => [
          'back_url' => "/departments",
          'message' => 'No data in post headers passed!'
        ]
      ]);
      return;
    }
    if (empty($id)) {
      $this->view->display("pages/error", [
        'title' => 'Error',
        'data' => [
          'back_url' => "/departments",
          'message' => 'No ID provided in query!'
        ]
      ]);
      return;
    }
    $dep_name = htmlspecialchars($_POST["dep_name"]);
    $departments_model = $this->loader->getModel('departments');
    if($departments_model->updateDepartment($id, $dep_name)) {
      $url = $this->loader->getLibrary('url');
      $url->redirect($this->config->common['base_url']."departments");
    } else {
      $this->view->display("pages/error", [
        'title' => 'Error',
        'data' => [
          'back_url' => "/departments",
          'message' => 'SQL query failed. Try with another values!'
        ]
      ]);
    }
  }
  
  function delete($id) {
    if (empty($id)) {
      $this->view->display("pages/error", [
        'title' => 'Error',
        'data' => [
          'back_url' => "/departments",
          'message' => 'No ID provided in query!'
        ]
      ]);
      return;
    }
    $departments_model = $this->loader->getModel('departments');
    $this->view->display('pages/departments/index', [
      'title' => 'Delete department',
      'data' => [
        'action' => 'delete',
        'departments' => [$departments_model->getDepartmentById($id)],
        'current_uri' => $_SERVER['REQUEST_URI']
      ]
    ]);
  }
  
  function delete_post($id) {
    if (empty($id)) {
      $this->view->display("pages/error", [
        'title' => 'Error',
        'data' => [
          'back_url' => "/departments",
          'message' => 'No ID provided in query!'
        ]
      ]);
      return;
    }
    $departments_model = $this->loader->getModel('departments');
    if($departments_model->deleteDepartment($id)) {
      $url = $this->loader->getLibrary('url');
      $url->redirect($this->config->common['base_url']."departments");
    } else {
      $this->view->display("pages/error", [
        'title' => 'Error',
        'data' => [
          'back_url' => "/departments",
          'message' => 'SQL query failed. Try with another values!'
        ]
      ]);
    }
  }
  
  function details($id) {
    $departments_model = $this->loader->getModel('departments');
    $this->view->display('pages/departments/index', [
      'title' => 'Department',
      'data' => [
        'action' => 'details',
        'departments' => [ $departments_model->getDepartmentById($id) ],
        'current_uri' => $_SERVER['REQUEST_URI']
      ]
    ]);
  }
}