<?php

namespace src\controller;

use src\model\user\UsersManager;
use src\model\user\User;
use app\View;

class UserController {

  // ATTRIBUTES

  private $usersManager;
  private $view;

  // FUNCTIONS

  public function __construct() {
    $this->usersManager = new UsersManager();
    $this->view = new View();
  }

  public function register() {
    $this->registerCheck();
    $this->view->render(__CLASS__, __FUNCTION__);
  }

  private function registerCheck() {
    if (!empty($_POST['name']) && !empty($_POST['password']) && !empty($_POST['password-confirm'])) {
      if ($_POST['password'] === $_POST['password-confirm']) {
        $entry = $this->usersManager->userNameCount($_POST['name']);
        if ($entry['nb_username'] == 0) {
          $user = new User(true, array(
            'name' => $_POST['name'],
            'password' => password_hash($_POST['password'], PASSWORD_DEFAULT)
          ));
          $this->usersManager->add($user);
          header('Location: login');
          exit();
        }
        else {
          $this->view->errorAssign('userName', true);
        }
      }
      else {
        $this->view->errorAssign('password', true);
      }
    }
    else if (isset($_POST['name']) && isset($_POST['password']) && isset($_POST['password-confirm'])) {
      $this->view->errorAssign('register', true);
    }
  }

  public function login() {
    $this->loginCheck();
    $this->view->render(__CLASS__, __FUNCTION__);
  }

  public function logout() {
    session_destroy();
    header('Location: login');
  }

  private function loginCheck() {
    if (!empty($_POST['name']) && !empty($_POST['password'])) {
      $user = $this->usersManager->user($_POST['name']);
      if (is_object($user)) {
        if (password_verify($_POST['password'], $user->getPassword())) {
          $_SESSION['name'] = $user->getName();
          header('Location: ../blog/admin');
          exit();
        }
        else {
          $this->view->errorAssign('password', true);
        }
      }
      else if ($user === false) {
        $this->view->errorAssign('name', true);
      }
    }
    else if (isset($_POST['name']) && isset($_POST['password'])) {
      $this->view->errorAssign('login', true);
    }
  }

}
