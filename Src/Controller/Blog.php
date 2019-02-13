<?php

namespace Src\Controller;

use Src\Model\PostsManager;
use Src\Model\CommentsManager;
use Src\Model\Comment;

class Blog {

  private $postsManagerInst;
  private $commentsManagerInst;

  public function __construct() {
    $this->postsManagerInst = new PostsManager();
    $this->commentsManagerInst = new CommentsManager();
  }

  public function home() {
    $posts = $this->postsManagerInst->allPosts();
    ob_start();
    require '../src/view/home.php';
    $content = ob_get_clean();
    require '../src/view/template.php';
  }

  public function chapter($chapterId) {
    $this->commentsChecking($chapterId);
    $post = $this->postsManagerInst->singlePost($chapterId);
    $comments = $this->commentsManagerInst->comments($chapterId);
    ob_start();
    require '../src/view/chapter.php';
    $content = ob_get_clean();
    require '../src/view/template.php';
  }

  private function commentsChecking($chapterId) {
    if (!empty($_POST['name']) && !empty($_POST['comment'])) {
      $comment = new Comment(true, null, $chapterId, $_POST['name'], $_POST['comment']);
      $this->commentsManagerInst->addComment($comment);
    }
    if (!empty($_POST['report_id'])) {
      $comment = new Comment(true, $_POST['report_id']);
      $this->commentsManagerInst->addCommentReport($comment);
    }
  }

}
