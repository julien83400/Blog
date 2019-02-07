<?php

namespace App;

class Comment {

  public $id;
  public $post_id;
  public $name;
  public $comment;
  public $date;
  public $report;

  public function __construct($addComment = false, $id = null, $post_id = null, $name = null, $comment = null) {
    if ($addComment === true) {
      $this->setId($id);
      $this->setPost_id($post_id);
      $this->setName($name);
      $this->setComment($comment);
    }
    $this->dateFormat($this->date);
  }

  private function setId($id) {
    $this->id = $id;
  }

  private function setPost_id($post_id) {
    $this->post_id = $post_id;
  }

  private function setName($name) {
    $this->name = $name;
  }

  private function setComment($comment) {
    $this->comment = $comment;
  }

  private function dateFormat($date) {
    $this->date = strftime('Le %d/%m/%Y à %Hh%Mmin%Ss',strtotime($date));
  }

}
