<?php

namespace src\model\blog;

use \PDO;
use src\model\Manager;

class CommentsManager extends Manager {

  // FUNCTIONS

  public function comments($postId) {
    $this->postId = $postId;
    $this->req = $this->pdo->prepare('SELECT * FROM comments WHERE post_id = ? ORDER BY date_creation DESC');
    $this->req->execute(array($this->postId));
    $comments = $this->req->fetchAll(PDO::FETCH_CLASS, 'src\model\blog\Comment');
    return $comments;
  }

  public function commentReport($commentId) {
    $this->commentId = $commentId;
    $this->req = $this->pdo->prepare('UPDATE comments SET report = 1 WHERE id = ?');
    $this->req->execute(array($this->commentId));
  }

  public function reportedComments() {
    $this->req = $this->pdo->query('SELECT * FROM comments WHERE report = 1 ORDER BY date_creation DESC');
    $reportedComments = $this->req->fetchAll(PDO::FETCH_CLASS, 'src\model\blog\Comment');
    return $reportedComments;
  }

  public function commentsDelete($postId) {
    $this->postId = $postId;
    $this->req = $this->pdo->prepare('DELETE FROM comments WHERE post_id = ?');
    $this->req->execute(array($this->postId));
  }

}
