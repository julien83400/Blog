<?php

namespace App;

class View {

  // ATTRIBUTES

  protected $content;
  protected $data;

  // FUNCTIONS

  public function render($className, $functionName) {
    $viewName = $this->viewName($className, $functionName);
    ob_start();
    // extract($this->data);
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

  public function assign($key, $value) {
    $this->data[$key] = $value;
  }

  // fonction include pour ressource statique (img, css)

}
