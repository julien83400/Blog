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

  public function getChapter($chapitreId) {
    $post = $this->_db->getSinglePost($chapitreId);
    ob_start();
    require 'Views/chapter.php';
    $content = ob_get_clean();
    require 'Views/template.php';
  }

}
