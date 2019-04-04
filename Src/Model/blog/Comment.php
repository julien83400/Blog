<?php

namespace src\model\blog;

use src\model\Model;

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

  protected function setReport($report) {
    $this->report = $report;
  }

  // GETTERS

  public function getPost_id() {
    return htmlspecialchars($this->post_id);
  }

  public function getName() {
    return htmlspecialchars($this->name);
  }

  public function getComment() {
    return htmlspecialchars($this->comment);
  }

  public function getReport() {
    return htmlspecialchars($this->report);
  }

}
