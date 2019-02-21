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
    $this->setPostsManager(new PostsManager());
    $this->setCommentsManager(new CommentsManager());
  }

  public function home() {
    $this->setPosts($this->postsManager->allPosts());
    $this->view(__FUNCTION__);
  }

  public function chapter($chapterId) {
    $this->setChapterId($chapterId);
    $this->commentAddCheck();
    $this->commentReportCheck();
    $this->setPost($this->postsManager->singlePost($this->chapterId));
    $this->setComments($this->commentsManager->comments($this->chapterId));
    $this->view(__FUNCTION__);
  }

  private function commentAddCheck() {
    if (!empty($_POST['name']) && !empty($_POST['comment'])) {
      $this->setComment(new Comment(true, array(
        'postId' => $this->chapterId,
        'name' => $_POST['name'],
        'comment' => $_POST['comment']
      )));
      $this->commentsManager->addComment($this->comment);
    }
    else if (isset($_POST['name']) && isset($_POST['comment'])) {
      $this->setAddCommentError(true);
    }
  }

  private function commentReportCheck() {
    if (!empty($_POST['report_id'])) {
      $this->commentsManager->commentReport($_POST['report_id']);
    }
  }

  // SETTERS

  private function setPostsManager($postsManager) {
    $this->postsManager = $postsManager;
  }

  private function setCommentsManager($commentsManager) {
    $this->commentsManager = $commentsManager;
  }

  private function setPosts($posts) {
    $this->posts = $posts;
  }

  private function setChapterId($chapterId) {
    $this->chapterId = $chapterId;
  }

  private function setPost($post) {
    $this->post = $post;
  }

  private function setComments($comments) {
    $this->comments = $comments;
  }

  private function setComment($comment) {
    $this->comment = $comment;
  }

  private function setAddCommentError($addCommentError) {
    $this->addCommentError = $addCommentError;
  }

}
