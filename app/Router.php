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
        self::urlNotFound();
      }
    }
    else {
      $this->urlChecking();
    }
  }

  private function urlChecking() {
    if (file_exists('../src/controller/' . ucfirst($this->explodedUrl[0]) . 'Controller.php')) {
      $controllerName = 'src\controller\\' . ucfirst($this->explodedUrl[0]) . 'Controller';
      $this->controller = new $controllerName;
      $method = $this->explodedUrl[1];
      if (method_exists($this->controller, $method)) {
        if (count($this->explodedUrl) === 3) {
          if (preg_match('#^[0-9]+$#', $this->explodedUrl[2])) {
            $this->controller->$method($this->explodedUrl[2]);
          }
          else {
            self::urlNotFound();
          }
        }
        else {
          $this->controller->$method();
        }
      }
      else {
        self::urlNotFound();
      }
    }
    else {
      self::urlNotFound();
    }
  }

  public static function urlNotFound() {
    echo 'Erreur 404 Not Found';
  }

  public static function sessionError() {
    echo 'Vous devez être connecté pour accéder à cette page';
  }

}
