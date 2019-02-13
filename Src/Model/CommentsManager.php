<?php

namespace Src\Model;

use \PDO;

class CommentsManager extends Manager {

  public function addComment($comment) {
    $req = $this->pdo->prepare('INSERT INTO comments(post_id, name, comment) VALUES (:chapterId, :name, :comment)');
    $req->execute([
      'chapterId' => $comment->getPostId(),
      'name' => $comment->getName(),
      'comment' => $comment->getComment()
    ]);
  }

  public function comments($chapterId) {
    $req = $this->pdo->prepare('SELECT * FROM comments WHERE post_id = ? ORDER BY date DESC');
    $req->execute([$chapterId]);
    $comments = $req->fetchAll(PDO::FETCH_CLASS, 'Src\Model\Comment');
    return $comments;
  }

  public function addCommentReport($comment) {
    $req = $this->pdo->prepare('UPDATE comments SET report = 1 WHERE id = ?');
    $req->execute([$comment->getId()]);
  }

}
