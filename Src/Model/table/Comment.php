<?php

namespace Src\Model\Table;

class Comment extends Table {

  // ATTRIBUTES

  private $post_id;
  private $comment;
  private $report;

  // FUNCTIONS

  public function __construct($hydrate = false, $commentAtr = null) {
    if ($hydrate === true) {
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

  protected function setComment($comment) {
    $this->comment = $comment;
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
