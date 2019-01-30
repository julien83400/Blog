<?php

namespace Src\Model;

class Comments_manager extends Manager {

  public function addComment($chapterId, $name, $comment) {
    $req = $this->pdo->prepare('INSERT INTO comments(post_id, name, comment) VALUES (:chapterId, :name, :comment)');
    $req->execute([
      'chapterId' => $chapterId,
      'name' => $name,
      'comment' => $comment
    ]);
  }

  public function comments($chapterId) {
    $req = $this->pdo->prepare('SELECT *, DATE_FORMAT(date, " Le %d/%m/%Y à %Hh%imin%ss") as date FROM comments WHERE post_id = ? ORDER BY date DESC');
    $req->execute([$chapterId]);
    $comments = $req->fetchAll();
    return $comments;
  }

  public function addCommentReport($reportId) {
    $req = $this->pdo->prepare('UPDATE comments SET report = 1 WHERE id = ?');
    $req->execute([$reportId]);
  }

}
