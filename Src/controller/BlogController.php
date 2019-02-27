<?php

namespace Src\Controller;

use Src\Model\PostsManager;
use Src\Model\CommentsManager;
use Src\Model\Table\Comment;

class BlogController extends Controller {

  // ATTRIBUTES

  protected $posts;
  protected $post;
  protected $comments;
  protected $addCommentError;
  private $postsManager;
  private $commentsManager;
  private $comment;
  private $chapterId;

  // FUNCTIONS

  public function __construct() {
    $this->postsManager = new PostsManager();
    $this->commentsManager = new CommentsManager();
  }

  public function home() {
    $this->posts = $this->postsManager->allPosts();
    $this->view(__FUNCTION__);
  }

  public function chapter($chapterId) {
    $this->chapterId = $chapterId;
    $this->commentAddCheck();
    $this->commentReportCheck();
    $this->post = $this->postsManager->singlePost($this->chapterId);
    $this->comments = $this->commentsManager->comments($this->chapterId);
    $this->view(__FUNCTION__);
  }

  private function commentAddCheck() {
    if (!empty($_POST['name']) && !empty($_POST['comment'])) {
      $this->comment = new Comment(true, array(
        'postId' => $this->chapterId,
        'name' => $_POST['name'],
        'comment' => $_POST['comment']
      ));
      $this->commentsManager->addComment($this->comment);
    }
    else if (isset($_POST['name']) && isset($_POST['comment'])) {
      $this->addCommentError = true;
    }
  }

  private function commentReportCheck() {
    if (!empty($_POST['report_id'])) {
      $this->commentsManager->commentReport($_POST['report_id']);
    }
  }

}
