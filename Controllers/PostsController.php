<?php

namespace Controllers;

use \Models\Db;

class PostsController {

  private $_db;

  public function __construct() {
    $this->_db = new Db();
  }

  public function getHomePage() {
    $posts = $this->_db->getAllPosts();
    ob_start();
    require 'Views/homepage.php';
    $content = ob_get_clean();
    require 'Views/template.php';
  }

  public function getChapter($chapterId) {
    if (!empty($_POST['name']) && !empty($_POST['comment'])) {
      $this->_db->setComment($chapterId, $_POST['name'], $_POST['comment']);
    }
    if (!empty($_POST['report_id'])) {
      $this->_db->setCommentReport($_POST['report_id']);
    }
    $post = $this->_db->getSinglePost($chapterId);
    $comments = $this->_db->getComments($chapterId);
    ob_start();
    require 'Views/chapter.php';
    $content = ob_get_clean();
    require 'Views/template.php';
  }

}
