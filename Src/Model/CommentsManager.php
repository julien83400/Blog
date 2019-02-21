<?php

namespace Src\Model;

use \PDO;

class CommentsManager extends Manager {

  // ATTRIBUTES

  private $comments;
  private $comment;
  private $commentId;

  // FUNCTIONS

  public function addComment($comment) {
    $this->setComment($comment);
    $this->setReq($this->pdo->prepare('INSERT INTO comments(post_id, name, comment) VALUES (:postId, :name, :comment)'));
    $this->req->execute(array(
      'postId' => $this->comment->getPostId(),
      'name' => $this->comment->getName(),
      'comment' => $this->comment->getComment()
    ));
  }

  public function comments($postId) {
    $this->setPostId($postId);
    $this->setReq($this->pdo->prepare('SELECT * FROM comments WHERE post_id = ? ORDER BY date DESC'));
    $this->req->execute(array($this->postId));
    $this->setComments($this->req->fetchAll(PDO::FETCH_CLASS, 'Src\Model\Table\Comment'));
    return $this->comments;
  }

  public function commentReport($commentId) {
    $this->setCommentId($commentId);
    $this->setReq($this->pdo->prepare('UPDATE comments SET report = 1 WHERE id = ?'));
    $this->req->execute(array($this->commentId));
  }

  // SETTERS

  private function setComments($comments) {
    $this->comments = $comments;
  }

  private function setComment($comment) {
    $this->comment = $comment;
  }

  private function setCommentId($commentId) {
    $this->commentId = $commentId;
  }

}
