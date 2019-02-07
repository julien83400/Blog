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
    $this->dateFormat($this->date);
  }

  private function postPreview() {
    $this->content = substr($this->content, 0, 1000) . '...';
  }

  private function dateFormat($date) {
    $this->date = strftime('Le %d/%m/%Y à %Hh%Mmin%Ss',strtotime($date));
  }

}
