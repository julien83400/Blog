<?php

namespace App;

use Src\Controller\BlogController;
use Src\Controller\AdminController;

class Router {

  // ATTRIBUTES

  private $url;
  private $controller;
  private $explodedUrl;

  // FUNCTIONS

  public function __construct($url) {
    $this->setUrl($url);
    $this->routing($this->url);
  }

  private function routing($url) {
    if ($url === '') {
      $this->setController(new BlogController());
      $this->controller->home();
    }
    else if (preg_match('#^blog/chapter/[0-9]+$#', $url)) {
      $this->setExplodedUrl(explode('/', $url));
      $this->setController(new BlogController());
      $this->controller->chapter($this->explodedUrl[2]);
    }
    else if ($url === 'admin/user/register') {
      $this->setController(new AdminController());
      $this->controller->userRegister();
    }
    else {
      echo 'Erreur 404';
    }
  }

  // SETTERS

  private function setUrl($url) {
    $this->url = $url;
  }

  private function setController($controller) {
    $this->controller = $controller;
  }

  private function setExplodedUrl($explodedUrl) {
    $this->explodedUrl = $explodedUrl;
  }

}

// article/read/3
// explode
// $test = array[0] . 'Controller'
// new $test;
// $test->array[1]();
