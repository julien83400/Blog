<?php

namespace Src\Model;

use \PDO;

class PostsManager extends Manager {

  public function allPosts() {
    $req = $this->pdo->query('SELECT *, DATE_FORMAT(date, "%d/%m/%Y à %Hh%imin%ss") as date FROM posts ORDER BY date DESC');
    $posts = $req->fetchAll(PDO::FETCH_CLASS, 'App\Post', [true]);
    return $posts;
  }

  public function singlePost($chapterId) {
    $req = $this->pdo->prepare('SELECT * FROM posts WHERE id = ?');
    $req->execute([$chapterId]);
    $post = $req->fetchObject('App\Post');
    return $post;
  }

}
