<?php

namespace app;

class View {

  // ATTRIBUTES

  private $content;
  private $data;
  private $error;
  private $confirm;
  private $navbar;

  // FUNCTIONS

  public function render($className, $functionName) {
    $viewName = $this->viewName($className, $functionName);
    $this->navbar($viewName);
    ob_start();
    require '../src/view/' . $viewName . '.php';
    $this->content = ob_get_clean();
    require '../src/view/template.php';
  }

  private function viewName($className, $functionName) {
    $explodedClassName = explode('\\', $className);
    $folderName = str_replace('Controller', '', $explodedClassName[2]);
    $folderName = strtolower($folderName);
    $viewName = $folderName . '/' . $functionName;
    return $viewName;
  }

  private function navbar($viewName) {
    if ($viewName === 'blog/home' || $viewName === 'blog/chapter') {
      $this->navbar = true;
    }
  }

  public function assign($key, $value) {
    $this->data[$key] = $value;
  }

  public function errorAssign($key, $value) {
    $this->error[$key] = $value;
  }

  public function confirmAssign($key, $value) {
    $this->confirm[$key] = $value;
  }

}
