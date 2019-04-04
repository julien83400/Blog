<?php

namespace src\model\blog;

use \PDO;
use src\model\Manager;

class PostsManager extends Manager {

  // FUNCTIONS

  public function allPosts() {
    $this->req = $this->pdo->query('SELECT * FROM posts ORDER BY date_creation DESC');
    $posts = $this->req->fetchAll(PDO::FETCH_CLASS, 'src\model\blog\Post', array(true));
    return $posts;
  }

  public function singlePost($postId) {
    $this->postId = $postId;
    $this->req = $this->pdo->prepare('SELECT * FROM posts WHERE id = ?');
    $this->req->execute(array($this->postId));
    $post = $this->req->fetchObject('src\model\blog\Post');
    return $post;
  }

  public function user($nameAttribute, $userName) {
    $this->userName = $userName;
    $this->req = $this->pdo->prepare('SELECT name, password FROM users WHERE name = ?');
    $this->req->execute(array($this->userName));
    $userFetch = $this->req->fetchObject('src\model\user\User');
    return $userFetch;
  }

  public function postUpdate($postData) {
    $this->postId = $postData['postId'];
    $this->req = $this->pdo->prepare('UPDATE posts SET title = :title, content = :content WHERE id = :id');
    $result = $this->req->execute(array(
      'id' => $this->postId,
      'title' => $postData['title'],
      'content' => $postData['content']
    ));
    return $result;
  }

  public function chapterIdCheck($chapterId) {
    $this->postId = $chapterId;
    $this->req = $this->pdo->prepare('SELECT COUNT(*) AS nb_id FROM posts WHERE id = ?');
    $this->req->execute(array($this->postId));
    $result = $this->req->fetch();
    return $result;
  }

}
