<?php

namespace Src\Model\Blog;

use Src\Model\Table\Model;

class Comment extends Model {

  // ATTRIBUTES

  private $post_id;
  private $comment;
  private $report;
  private $name;

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

  protected function setName($name) {
    $this->name = $name;
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
