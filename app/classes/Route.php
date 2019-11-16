<?php

  // namespace App\App\Classes;

  // use App\Controllers\HomeController;

  class Route {
    public $request_uri;
    public $request_method;

    public function __construct() {
      $this->request_uri = $_SERVER['REQUEST_URI'];
      $this->request_method = $_SERVER['REQUEST_METHOD'];
    }


    public static function get($routes) {
      $class = new self;
      $current_uri = $class->request_uri;

      if($class->request_method == "GET") {
        if(array_key_exists($class->request_uri, $routes)) {
          $action = $routes[$class->request_uri];
          return preg_match('/[a-z]@[a-z]/', $action) ? static::callAction(...explode('@', $action)) : view($action);
        }
      }
    }
    
    public static function post($routes) {
      $class = new self;
      
      if($class->request_method == "POST") {
      $current_uri = $class->request_uri;
        if(array_key_exists($class->request_uri, $routes)) {
          $action = $routes[$class->request_uri];
          return preg_match('/[a-z]@[a-z]/', $action) ? static::callAction(...explode('@', $action)) : view($action);
        }
      }
    }


    protected static function callAction($controller, $action)
    {
      $controller = new $controller;

      if(! method_exists($controller, $action)) {
        throw new Exception("No action defined for this route");
        die("No action defined for this route");
      }

      return $controller->$action();
    }
  }