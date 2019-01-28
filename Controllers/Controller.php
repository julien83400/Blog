<?php

namespace Controllers;

use \Models\Posts;
use \Models\Comments;

class Controller {

  private $_postsInst;
  private $_commentsInst;

  public function __construct() {
    $this->_postsInst = new Posts();
    $this->_commentsInst = new Comments();
  }

  public function home() {
    $posts = $this->_postsInst->allPosts();
    ob_start();
    require 'Views/home.php';
    $content = ob_get_clean();
    require 'Views/template.php';
  }

  public function chapter($chapterId) {
    $this->commentsChecking($chapterId);
    $post = $this->_postsInst->singlePost($chapterId);
    $comments = $this->_commentsInst->comments($chapterId);
    ob_start();
    require 'Views/chapter.php';
    $content = ob_get_clean();
    require 'Views/template.php';
  }

  private function commentsChecking($chapterId) {
    if (!empty($_POST['name']) && !empty($_POST['comment'])) {
      $this->_commentsInst->addComment($chapterId, $_POST['name'], $_POST['comment']);
    }
    if (!empty($_POST['report_id'])) {
      $this->_commentsInst->addCommentReport($_POST['report_id']);
    }
  }

}
