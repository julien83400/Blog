<?php

namespace App;
use Src\Controller\BlogController;

class Router {

  private $url;

  public function __construct($url) {
    $this->url = $url;
    $this->routing($this->url);
  }

  private function routing($url) {
    if ($url === '') {
      $blogController = new BlogController();
      $blogController->home();
    }
    else if (preg_match('#^chapter/[0-9]+$#', $url)) {
      $array = explode('/', $url);
      $blogController = new BlogController();
      $blogController->chapter($array[1]);
    }
    else {
      echo 'Erreur 404';
    }
  }

}
