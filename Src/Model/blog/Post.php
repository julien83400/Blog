<?php

namespace Src\Model\Blog;

use Src\Model\Table\Model;

class Post extends Model {

  // ATTRIBUTES

  private $title;
  private $content;

  // FUNCTIONS

  public function __construct($postPreview = false, $hydrate = false, $postAtr = null) {
    if ($hydrate === true) {
      $this->hydrate($postAtr);
    }
    else {
      $this->dateFormat();
      if ($postPreview === true) {
        $this->postPreview();
      }
    }
  }

  private function postPreview() {
    $this->content = strip_tags($this->content);
    $this->content = substr($this->content, 0, 1000) . '...';
  }

  // SETTERS

  protected function setTitle($title) {
    $this->title = $title;
  }

  protected function setContent($content) {
    $this->content = $content;
  }

  // GETTERS

  public function getTitle() {
    return $this->title;
  }

  public function getContent() {
    return $this->content;
  }

}
