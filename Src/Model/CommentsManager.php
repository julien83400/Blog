<?php

namespace Src\Model;

use \PDO;

class CommentsManager extends Manager {

  public function addComment($comment) {
    $req = $this->pdo->prepare('INSERT INTO comments(post_id, name, comment) VALUES (:chapterId, :name, :comment)');
    $req->execute([
      'chapterId' => $comment->post_id,
      'name' => $comment->name,
      'comment' => $comment->comment
    ]);
  }

  public function comments($chapterId) {
    $req = $this->pdo->prepare('SELECT *, DATE_FORMAT(date, " Le %d/%m/%Y à %Hh%imin%ss") as date FROM comments WHERE post_id = ? ORDER BY date DESC');
    $req->execute([$chapterId]);
    $comments = $req->fetchAll(PDO::FETCH_CLASS, 'App\Comment');
    return $comments;
  }

  public function addCommentReport($comment) {
    $req = $this->pdo->prepare('UPDATE comments SET report = 1 WHERE id = ?');
    $req->execute([$comment->id]);
  }

}
