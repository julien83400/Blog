<?php

namespace Src\Model;

use \PDO;

class PostsManager extends Manager {

  // ATTRIBUTES

  private $posts;
  private $post;

  // FUNCTIONS

  public function allPosts() {
    $this->setReq($this->pdo->query('SELECT * FROM posts ORDER BY date DESC'));
    $this->setPosts($this->req->fetchAll(PDO::FETCH_CLASS, 'Src\Model\Table\Post', array(true)));
    return $this->posts;
  }

  public function singlePost($postId) {
    $this->setPostId($postId);
    $this->setReq($this->pdo->prepare('SELECT * FROM posts WHERE id = ?'));
    $this->req->execute(array($this->postId));
    $this->setPost($this->req->fetchObject('Src\Model\Table\Post'));
    return $this->post;
  }

  // SETTERS

  private function setPosts($posts) {
    $this->posts = $posts;
  }

  private function setPost($post) {
    $this->post = $post;
  }

}
