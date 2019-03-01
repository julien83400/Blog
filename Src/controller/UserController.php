<?php

namespace Src\Controller;

use Src\Model\UsersManager;
use Src\Model\Table\User;

class UserController extends Controller {

  // ATTRIBUTES

  private $usersManager;
  private $user;
  protected $passwordError;
  protected $registerError;
  protected $loginError;
  protected $nameError;

  // FUNCTIONS

  public function __construct() {
    $this->usersManager = new UsersManager();
  }

  public function register() {
    $this->registerCheck();
    $this->view(__FUNCTION__);
  }

  private function registerCheck() {
    if (!empty($_POST['name']) && !empty($_POST['password']) && !empty($_POST['password-confirm'])) {
      if ($_POST['password'] === $_POST['password-confirm']) {
        $this->user = new User(true, array(
          'name' => $_POST['name'],
          'password' => password_hash($_POST['password'], PASSWORD_DEFAULT)
        ));
        $this->usersManager->addUser($this->user);
        header('Location: login');
        exit();
      }
      else {
        $this->passwordError = true;
      }
    }
    else if (isset($_POST['name']) && isset($_POST['password']) && isset($_POST['password-confirm'])) {
      $this->registerError = true;
    }
  }

  public function login() {
    $this->loginCheck();
    $this->view(__FUNCTION__);
  }

  public function logout() {
    session_destroy();
    header('Location: login');
  }

  private function loginCheck() {
    if (!empty($_POST['name']) && !empty($_POST['password'])) {
      $this->user = $this->usersManager->user($_POST['name']);
      if (is_object($this->user)) {
        if (password_verify($_POST['password'], $this->user->getPassword())) {
          $_SESSION['name'] = $this->user->getName();
          header('Location: ../blog/admin');
          exit();
        }
        else {
          $this->passwordError = true;
        }
      }
      else if ($this->user === false) {
        $this->nameError = true;
      }
    }
    else if (isset($_POST['name']) && isset($_POST['password'])) {
      $this->loginError = true;
    }
  }

}
