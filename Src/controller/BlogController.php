<?php

namespace Src\Controller;

use Src\Model\PostsManager;
use Src\Model\CommentsManager;
use Src\Model\Table\Comment;
use App\Router;

class BlogController extends Controller {

  // ATTRIBUTES

  protected $posts;
  protected $post;
  protected $comments;
  protected $reportedComments;
  protected $addCommentError;
  protected $chapterId;
  protected $postUpdated;
  protected $postCreateError;
  protected $postCreated;
  private $postsManager;
  private $commentsManager;
  private $comment;

  // FUNCTIONS

  public function __construct() {
    $this->postsManager = new PostsManager();
    $this->commentsManager = new CommentsManager();
  }

  public function home() {
    $this->getAllPosts();
    $this->view(__FUNCTION__);
  }

  public function chapter($chapterId) {
    $this->chapterId = $chapterId;
    $this->commentAddCheck();
    $this->commentReportCheck();
    $this->getSinglePost();
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

  public function admin() {
    if (isset($_SESSION['name'])) {
      $this->view(__FUNCTION__);
    }
    else {
      Router::sessionError();
    }
  }

  public function create() {
    if (isset($_SESSION['name'])) {
      if (!empty($_POST['title']) && !empty($_POST['content'])) {
        $this->postCreated = $this->postsManager->postCreate(array(
          'title' => strip_tags($_POST['title']),
          'content' => strip_tags($_POST['content'])
        ));
      }
      else {
        if (isset($_POST['title']) && isset($_POST['content'])) {
          $this->postCreateError = true;
        }
      }
      $this->view(__FUNCTION__);
    }
    else {
      Router::sessionError();
    }
  }

  public function update($chapterId = null) {
    if (isset($_SESSION['name'])) {
      $this->chapterId = $chapterId;
      if ($this->chapterId !== null) {
        if (!empty($_POST['title']) && !empty($_POST['content'])) {
          $this->postUpdated = $this->postsManager->postUpdate(array(
            'postId' => $this->chapterId,
            'title' => $_POST['title'],
            'content' => $_POST['content']
          ));
        }
        $this->getSinglePost();
      }
      else {
        $this->getAllPosts();
      }
      $this->view(__FUNCTION__);
    }
    else {
      Router::sessionError();
    }
  }

  public function delete() {
    if (isset($_SESSION['name'])) {
      if (!empty($_POST['delete'])) {
        $this->chapterId = $_POST['delete'];
        $this->postsManager->postDelete($this->chapterId);
        $this->commentsManager->commentsDelete($this->chapterId);
      }
      $this->getAllPosts();
      $this->view(__FUNCTION__);
    }
    else {
      Router::sessionError();
    }
  }

  public function comments() {
    if (isset($_SESSION['name'])) {
      if (!empty($_POST['delete'])) {
        $this->commentsManager->commentDelete($_POST['delete']);
      }
      $this->reportedComments = $this->commentsManager->reportedComments();
      $this->view(__FUNCTION__);
    }
    else {
      Router::sessionError();
    }
  }

  private function getAllPosts() {
    $this->posts = $this->postsManager->allPosts();
  }

  private function getSinglePost() {
    $this->post = $this->postsManager->singlePost($this->chapterId);
  }

}
