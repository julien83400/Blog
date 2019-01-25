<?php

namespace Models;

use \Db_config;
use \PDO;

class Db {

  private $_dbname;
  private $_dbuser;
  private $_dbpass;
  private $_dbhost;
  private $_pdo;

  public function __construct() {
    $dbIds = Db_config::getDbIds();
    $this->setDbIds($dbIds);
    $this->setPDO();
  }

  private function setDbIds($dbIds) {
    $this->_dbname = $dbIds['dbname'];
    $this->_dbuser = $dbIds['dbuser'];
    $this->_dbpass = $dbIds['dbpass'];
    $this->_dbhost = $dbIds['dbhost'];
  }

  private function setPDO() {
    $this->_pdo = new PDO('mysql:dbname=' . $this->_dbname . ';host=' . $this->_dbhost, $this->_dbuser, $this->_dbpass);
  }

  public function getAllPosts() {
    $req = $this->_pdo->query('SELECT *, DATE_FORMAT(date, "%d/%m/%Y à %Hh%imin%ss") as date FROM posts ORDER BY date DESC');
    $posts = $req->fetchAll();
    return $posts;
  }

  public function getSinglePost($chapterId) {
    $req = $this->_pdo->prepare('SELECT * FROM posts WHERE id = ?');
    $req->execute([$chapterId]);
    $post = $req->fetch();
    return $post;
  }

  public function setComment($chapterId, $name, $comment) {
    $req = $this->_pdo->prepare('INSERT INTO comments(post_id, name, comment) VALUES (:chapterId, :name, :comment)');
    $req->execute([
      'chapterId' => $chapterId,
      'name' => $name,
      'comment' => $comment
    ]);
  }

  public function getComments($chapterId) {
    $req = $this->_pdo->prepare('SELECT *, DATE_FORMAT(date, " Le %d/%m/%Y à %Hh%imin%ss") as date FROM comments WHERE post_id = ? ORDER BY date DESC');
    $req->execute([$chapterId]);
    $comments = $req->fetchAll();
    return $comments;
  }

  public function setCommentReport($reportId) {
    $req = $this->_pdo->prepare('UPDATE comments SET report = 1 WHERE id = ?');
    $req->execute([$reportId]);
  }

}
