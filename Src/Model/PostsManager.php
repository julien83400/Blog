<?php

namespace Src\Model;

use \PDO;

class PostsManager extends Manager {

  public function allPosts() {
    $req = $this->pdo->query('SELECT * FROM posts ORDER BY date DESC');
    $posts = $req->fetchAll(PDO::FETCH_CLASS, 'Src\Model\Post', [true]);
    return $posts;
  }

  public function singlePost($chapterId) {
    $req = $this->pdo->prepare('SELECT * FROM posts WHERE id = ?');
    $req->execute([$chapterId]);
    $post = $req->fetchObject('Src\Model\Post');
    return $post;
  }

}
