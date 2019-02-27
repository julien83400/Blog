<?php

namespace Src\Model;

use \PDO;

class CommentsManager extends Manager {

  // FUNCTIONS

  public function addComment($comment) {
    $this->req = $this->pdo->prepare('INSERT INTO comments(post_id, name, comment) VALUES (:postId, :name, :comment)');
    $this->req->execute(array(
      'postId' => $comment->getPostId(),
      'name' => $comment->getName(),
      'comment' => $comment->getComment()
    ));
  }

  public function comments($postId) {
    $this->postId = $postId;
    $this->req = $this->pdo->prepare('SELECT * FROM comments WHERE post_id = ? ORDER BY date DESC');
    $this->req->execute(array($this->postId));
    $comments = $this->req->fetchAll(PDO::FETCH_CLASS, 'Src\Model\Table\Comment');
    return $comments;
  }

  public function commentReport($commentId) {
    $this->req = $this->pdo->prepare('UPDATE comments SET report = 1 WHERE id = ?');
    $this->req->execute(array($commentId));
  }

}
