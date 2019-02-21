<?php

namespace Src\Model;

class UsersManager extends Manager {

  // ATTRIBUTES

  private $user;

  // FUNCTIONS

  public function addUser($user) {
    $this->setUser($user);
    $this->setReq($this->pdo->prepare('INSERT INTO users(user, password) VALUES (:name, :password)'));
    $this->req->execute(array(
      'name' => $this->user->getName(),
      'password' => $this->user->getPassword()
    ));
  }

  // SETTERS

  private function setUser($user) {
    $this->user = $user;
  }

}
