<?php

namespace Src\Controller;

use Src\Model\UsersManager;
use Src\Model\Table\User;

class AdminController extends Controller {

  // ATTRIBUTES

  private $usersManager;
  private $user;
  protected $passwordError;
  protected $registerError;

  // FUNCTIONS

  public function __construct() {
    $this->setUsersManager(new UsersManager());
  }

  public function userRegister() {
    $this->userRegisterCheck();
    $this->view(__FUNCTION__);
  }

  private function userRegisterCheck() {
    if (!empty($_POST['name']) && !empty($_POST['password']) && !empty($_POST['password-confirm'])) {
      if ($_POST['password'] === $_POST['password-confirm']) {
        $this->setUser(new User(array(
          'name' => $_POST['name'],
          'password' => password_hash($_POST['password'], PASSWORD_DEFAULT)
        )));
        $this->usersManager->addUser($this->user);
      }
      else {
        $this->setPasswordError(true);
      }
    }
    else if (isset($_POST['name']) && isset($_POST['password']) && isset($_POST['password-confirm'])) {
      $this->setRegisterError(true);
    }
  }

  // SETTERS

  private function setUser($user) {
    $this->user = $user;
  }

  private function setPasswordError($passwordError) {
    $this->passwordError = $passwordError;
  }

  private function setRegisterError($registerError) {
    $this->registerError = $registerError;
  }

  private function setUsersManager($usersManager) {
    $this->usersManager = $usersManager;
  }

}
