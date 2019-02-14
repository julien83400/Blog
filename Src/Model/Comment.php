<?php

namespace Src\Model;

class Comment extends Content {

  private $post_id;
  private $name;
  private $comment;
  private $report;

 // TO DO set attributes dynamicly !

  public function __construct($addComment = false, $id = null, $post_id = null, $name = null, $comment = null) {
    if ($addComment === true) {
      $this->setId($id);
      $this->setPostId($post_id);
      $this->setName($name);
      $this->setComment($comment);
    }
    $this->dateFormat($this->date);
  }

  private function setId($id) {
    $this->id = $id;
  }

  private function setPostId($post_id) {
    $this->post_id = $post_id;
  }

  private function setName($name) {
    $this->name = $name;
  }

  private function setComment($comment) {
    $this->comment = $comment;
  }

  public function getPostId() {
    return $this->post_id;
  }

  public function getName() {
    return $this->name;
  }

  public function getComment() {
    return $this->comment;
  }

  public function getReport() {
    return $this->report;
  }

}
