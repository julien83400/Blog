<?php

namespace Src\Controller;

use Src\Model\Posts_manager;
use Src\Model\Comments_manager;

class Blog {

  private $postsInst;
  private $commentsInst;

  public function __construct() {
    $this->postsInst = new Posts_manager();
    $this->commentsInst = new Comments_manager();
  }

  public function home() {
    $posts = $this->postsInst->allPosts();
    ob_start();
    require '../Src/View/home.php';
    $content = ob_get_clean();
    require '../Src/View/template.php';
  }

  public function chapter($chapterId) {
    $this->commentsChecking($chapterId);
    $post = $this->postsInst->singlePost($chapterId);
    $comments = $this->commentsInst->comments($chapterId);
    ob_start();
    require '../Src/View/chapter.php';
    $content = ob_get_clean();
    require '../Src/View/template.php';
  }

  private function commentsChecking($chapterId) {
    if (!empty($_POST['name']) && !empty($_POST['comment'])) {
      $this->commentsInst->addComment($chapterId, $_POST['name'], $_POST['comment']);
    }
    if (!empty($_POST['report_id'])) {
      $this->commentsInst->addCommentReport($_POST['report_id']);
    }
  }

}
