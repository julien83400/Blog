<?php

namespace Src\Controller;

abstract class Controller {

  // ATTRIBUTES

  private $viewName;
  private $content;

  // FUNCTIONS

  protected function view($viewName) {
    $this->setViewName($viewName);
    ob_start();
    require '../src/view/' . $this->viewName . '.php';
    $this->setContent(ob_get_clean());
    require '../src/view/template.php';
  }

  // SETTERS

  private function setViewName($viewName) {
    $this->viewName = $viewName;
  }

  private function setContent($content) {
    $this->content = $content;
  }

}
