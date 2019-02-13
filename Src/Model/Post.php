<?php

namespace Src\Model;

class Post {

  private $id;
  private $title;
  private $content;
  private $date;

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
    $this->date = strftime('le %d/%m/%Y à %Hh%Mmin%Ss',strtotime($date));
  }

  public function getId() {
    return $this->id;
  }

  public function getTitle() {
    return $this->title;
  }

  public function getcontent() {
    return $this->content;
  }

  public function getDate() {
    return $this->date;
  }

}
