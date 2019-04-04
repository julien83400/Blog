<?php

namespace src\controller;

use src\model\blog\PostsManager;
use src\model\blog\CommentsManager;
use src\model\blog\Comment;
use src\model\blog\Post;
use app\Router;
use app\View;

class BlogController {

  // ATTRIBUTES

  private $postsManager;
  private $commentsManager;
  private $view;

  // FUNCTIONS

  public function __construct() {
    $this->postsManager = new PostsManager();
    $this->commentsManager = new CommentsManager();
    $this->view = new View();
  }

  public function home() {
    $this->getAllPosts();
    $this->view->render(__CLASS__, __FUNCTION__);
  }

  public function chapter($chapterId) {
    $entry = $this->postsManager->chapterIdCheck($chapterId);
    if ($entry['nb_id'] > 0) {
      $this->commentAddCheck($chapterId);
      $this->commentReportCheck();
      $this->getSinglePost($chapterId);
      $comments = $this->commentsManager->comments($chapterId);
      $this->view->assign('comments', $comments);
      $this->view->render(__CLASS__, __FUNCTION__);
    }
    else {
      Router::urlNotFound();
    }
  }

  private function commentAddCheck($chapterId) {
    if (!empty($_POST['name']) && !empty($_POST['comment'])) {
      $comment = new Comment(true, array(
        'postId' => $chapterId,
        'name' => $_POST['name'],
        'comment' => $_POST['comment'],
        'report' => 0
      ));
      $this->commentsManager->add($comment);
      $this->view->confirmAssign('commentCreated', true);
    }
    else if (isset($_POST['name']) && isset($_POST['comment'])) {
      $this->view->errorAssign('addComment', true);
    }
  }

  private function commentReportCheck() {
    if (!empty($_POST['report_id'])) {
      $this->commentsManager->commentReport($_POST['report_id']);
    }
  }

  public function admin() {
    if (isset($_SESSION['name'])) {
      $this->view->render(__CLASS__, __FUNCTION__);
    }
    else {
      Router::sessionError();
    }
  }

  public function create() {
    if (isset($_SESSION['name'])) {
      if (!empty($_POST['title']) && !empty($_POST['content'])) {
        $post = new Post(false, true, array(
          'title' => $_POST['title'],
          'content' => $_POST['content']
        ));
        $this->postsManager->add($post);
        $this->view->confirmAssign('postCreated', true);
      }
      else {
        if (isset($_POST['title']) && isset($_POST['content'])) {
          $this->view->errorAssign('postCreate', true);
        }
      }
      $this->view->render(__CLASS__, __FUNCTION__);
    }
    else {
      Router::sessionError();
    }
  }

  public function update($chapterId = null) {
    if (isset($_SESSION['name'])) {
      $this->view->assign('chapterId', $chapterId);
      if ($chapterId !== null) {
        $entry = $this->postsManager->chapterIdCheck($chapterId);
        if ($entry['nb_id'] > 0) {
          if (!empty($_POST['title']) && !empty($_POST['content'])) {
            $this->postsManager->postUpdate(array(
              'postId' => $chapterId,
              'title' => $_POST['title'],
              'content' => $_POST['content']
            ));
            $this->view->confirmAssign('postUpdated', true);
          }
          $this->getSinglePost($chapterId);
          $this->view->render(__CLASS__, __FUNCTION__);
        }
        else {
          Router::urlNotFound();
        }
      }
      else {
        $this->getAllPosts();
        $this->view->render(__CLASS__, __FUNCTION__);
      }
    }
    else {
      Router::sessionError();
    }
  }

  public function delete() {
    if (isset($_SESSION['name'])) {
      if (!empty($_POST['delete'])) {
        $chapterId = $_POST['delete'];
        $class = get_class($this->postsManager);
        $this->postsManager->delete($chapterId, $class);
        $this->view->confirmAssign('postDeleted', true);
        $this->commentsManager->commentsDelete($chapterId);
      }
      $this->getAllPosts();
      $this->view->render(__CLASS__, __FUNCTION__);
    }
    else {
      Router::sessionError();
    }
  }

  public function comments() {
    if (isset($_SESSION['name'])) {
      if (!empty($_POST['delete'])) {
        $class = get_class($this->commentsManager);
        $this->commentsManager->delete($_POST['delete'], $class);
      }
      $reportedComments = $this->commentsManager->reportedComments();
      $this->view->assign('reportedComments', $reportedComments);
      $this->view->render(__CLASS__, __FUNCTION__);
    }
    else {
      Router::sessionError();
    }
  }

  private function getAllPosts() {
    $posts = $this->postsManager->allPosts();
    $this->view->assign('posts', $posts);
  }

  private function getSinglePost($chapterId) {
    $post = $this->postsManager->singlePost($chapterId);
    $this->view->assign('post', $post);
  }

}
