<?php

namespace Controllers;

use \Models\Db;

class PostsController {

  private $_db;

  public function __construct() {
    $this->_db = new Db();
  }

  public function getHomePage() {
    $datas = $this->_db->getAllPosts();
    require 'Views/homepage.php';
  }

}
