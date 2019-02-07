<?php

namespace App;

class Post {

  public $id;
  public $title;
  public $content;
  public $date;

  public function __construct($postPreview = false) {
    if ($postPreview === true) {
      $this->postPreview();
    }
  }

  private function postPreview() {
    $this->content = substr($this->content, 0, 1000) . '...';
  }

}
