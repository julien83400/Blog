<?php

namespace Src\Model;

class Post extends Content {

  private $title;
  private $content;

  public function __construct($postPreview = false) {
    if ($postPreview === true) {
      $this->postPreview();
    }
    $this->dateFormat($this->date);
  }

  private function postPreview() {
    $this->content = substr($this->content, 0, 1000) . '...';
  }

  public function getTitle() {
    return $this->title;
  }

  public function getcontent() {
    return $this->content;
  }

}
