<?php

namespace Src\Model\Table;

class Post extends Table {

  // ATTRIBUTES

  private $title;
  private $content;

  // FUNCTIONS

  public function __construct($postPreview = false) {
    $this->dateFormat();
    if ($postPreview === true) {
      $this->postPreview();
    }
  }

  private function postPreview() {
    $this->content = substr($this->content, 0, 1000) . '...';
  }

  // GETTERS

  public function getTitle() {
    return $this->title;
  }

  public function getContent() {
    return $this->content;
  }

}
