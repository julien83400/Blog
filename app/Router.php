<?php

namespace App;

use Src\Controller\BlogController;

class Router {

  // ATTRIBUTES

  private $controller;
  private $explodedUrl;

  // FUNCTIONS

  public function __construct($url) {
    $this->routing($url);
  }

  private function routing($url) {
    $this->explodedUrl = explode('/', $url);
    if (count($this->explodedUrl) === 1) {
      if ($this->explodedUrl[0] === '') {
        $this->controller = new BlogController();
        $this->controller->home();
      }
      else {
        $this->urlError();
      }
    }
    else if (count($this->explodedUrl) === 2) {
      $this->urlChecking();
    }
    else if (count($this->explodedUrl) === 3) {
      $this->urlChecking(true);
    }
  }

  private function urlChecking($methodParameter = false) {
    if (file_exists('../Src/Controller/' . ucfirst($this->explodedUrl[0]) . 'Controller.php')) {
      $controllerName = 'Src\Controller\\' . ucfirst($this->explodedUrl[0]) . 'Controller';
      $this->controller = new $controllerName;
      if (method_exists($this->controller, $this->explodedUrl[1])) {
        $method = $this->explodedUrl[1];
        if ($methodParameter) {
          if (preg_match('#^[0-9]+$#', $this->explodedUrl[2])) {
            $this->controller->$method($this->explodedUrl[2]);
          }
          else {
            $this->urlError();
          }
        }
        else {
          $this->controller->$method();
        }
      }
      else {
        $this->urlError();
      }
    }
    else {
      $this->urlError();
    }
  }

  private function urlError() {
    echo 'Erreur 404 Not Found';
  }

  public static function sessionError() {
    echo 'Vous devez être connecté pour accéder à cette page';
  }

}
