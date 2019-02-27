<?php

namespace Src\Controller;

abstract class Controller {

  private $content;

  // FUNCTIONS

  protected function view($viewName) {
    ob_start();
    require '../src/view/' . $viewName . '.php';
    $this->content = ob_get_clean();
    require '../src/view/template.php';
  }

}
