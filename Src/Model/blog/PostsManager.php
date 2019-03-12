<?php

namespace Src\Model\Blog;

use \PDO;
use Src\Model\Manager;

class PostsManager extends Manager {

  // FUNCTIONS

  public function allPosts() {
    $this->req = $this->pdo->query('SELECT * FROM posts ORDER BY date_creation DESC');
    $posts = $this->req->fetchAll(PDO::FETCH_CLASS, 'Src\Model\Blog\Post', array(true));
    return $posts;
  }

  public function singlePost($postId) {
    $this->postId = $postId;
    $this->req = $this->pdo->prepare('SELECT * FROM posts WHERE id = ?');
    $this->req->execute(array($this->postId));
    $post = $this->req->fetchObject('Src\Model\Blog\Post');
    return $post;
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

  public function postDelete($postId) {
    $this->postId = $postId;
    $this->req = $this->pdo->prepare('DELETE FROM posts WHERE id = ?');
    $result = $this->req->execute(array($this->postId));
    return $result;
  }

  public function postCreate($post) {
    $this->req = $this->pdo->prepare('INSERT INTO posts(title, content) VALUES (:title, :content)');
    $result = $this->req->execute(array(
      'title' => $post->getTitle(),
      'content' => $post->getContent()
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
