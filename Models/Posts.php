<?php

namespace Models;

use \Db_config;

class Posts {

  private $_pdo;

  public function __construct() {
    $this->_pdo = Db_config::getPDO();
  }

  public function allPosts() {
    $req = $this->_pdo->query('SELECT *, DATE_FORMAT(date, "%d/%m/%Y à %Hh%imin%ss") as date FROM posts ORDER BY date DESC');
    $posts = $req->fetchAll();
    return $posts;
  }

  public function singlePost($chapterId) {
    $req = $this->_pdo->prepare('SELECT * FROM posts WHERE id = ?');
    $req->execute([$chapterId]);
    $post = $req->fetch();
    return $post;
  }

}
