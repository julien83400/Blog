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
  protected $chapterId;
  protected $postUpdated;
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
    $this->loginCheck(__FUNCTION__);
  }

  public function create() {
    $this->loginCheck(__FUNCTION__);
  }

  public function update($chapterId = null) {
    $this->chapterId = $chapterId;
    $this->loginCheck(__FUNCTION__);
  }

  public function delete() {
    $this->loginCheck(__FUNCTION__);
  }

  private function loginCheck($function) {
    if (isset($_SESSION['name'])) {
      if ($function === 'update') {
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
      }
      else if ($function === 'delete') {
        if (!empty($_POST['delete'])) {
          $this->chapterId = $_POST['delete'];
          $this->postsManager->postDelete($this->chapterId);
        }
        $this->getAllPosts();
      }
      $this->view($function);
    }
    else {
      echo 'Vous devez vous connecter pour accéder à cette page';
    }
  }

  private function getAllPosts() {
    $this->posts = $this->postsManager->allPosts();
  }

  private function getSinglePost() {
    $this->post = $this->postsManager->singlePost($this->chapterId);
  }

}
