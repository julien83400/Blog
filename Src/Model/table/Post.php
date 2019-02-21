<?php

namespace Src\Model\Table;

class Post extends Table {

  // ATTRIBUTES

  private $title;
  private $content;
  private $postPreview;

  // FUNCTIONS

  public function __construct($postPreview = false) {
    $this->setPostPreview($postPreview);
    $this->dateFormat();
    if ($this->postPreview === true) {
      $this->postPreview();
    }
  }

  private function postPreview() {
    $this->content = substr($this->content, 0, 1000) . '...';
  }

  // SETTERS

  private function setPostPreview($postPreview) {
    $this->postPreview = $postPreview;
  }

  // GETTERS

  public function getTitle() {
    return $this->title;
  }

  public function getContent() {
    return $this->content;
  }

}
