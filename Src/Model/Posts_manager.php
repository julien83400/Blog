<?php

namespace Src\Model;

class Posts_manager extends Manager {

  public function allPosts() {
    $req = $this->pdo->query('SELECT *, DATE_FORMAT(date, "%d/%m/%Y à %Hh%imin%ss") as date FROM posts ORDER BY date DESC');
    $posts = $req->fetchAll();
    return $posts;
  }

  public function singlePost($chapterId) {
    $req = $this->pdo->prepare('SELECT * FROM posts WHERE id = ?');
    $req->execute([$chapterId]);
    $post = $req->fetch();
    return $post;
  }

}
