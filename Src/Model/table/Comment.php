<?php

namespace Src\Model\Table;

class Comment extends Table {

  // ATTRIBUTES

  private $post_id;
  private $name;
  private $comment;
  private $report;
  private $hydrate;

  // FUNCTIONS

  public function __construct($hydrate = false, $commentAtr = null) {
    $this->setHydrate($hydrate);
    if ($this->hydrate === true) {
      $this->hydrate($commentAtr);
    }
    else {
      $this->dateFormat();
    }
  }

  // SETTERS

  protected function setPostId($postId) {
    $this->post_id = $postId;
  }

  protected function setName($name) {
    $this->name = $name;
  }

  protected function setComment($comment) {
    $this->comment = $comment;
  }

  private function setHydrate($hydrate) {
    $this->hydrate = $hydrate;
  }

  // GETTERS

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
