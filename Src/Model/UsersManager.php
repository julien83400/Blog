<?php

namespace Src\Model;

class UsersManager extends Manager {

  // FUNCTIONS

  public function addUser($user) {
    $this->req = $this->pdo->prepare('INSERT INTO users(name, password) VALUES (:name, :password)');
    $this->req->execute(array(
      'name' => $user->getName(),
      'password' => $user->getPassword()
    ));
  }

  public function user($userName) {
    $this->req = $this->pdo->prepare('SELECT name, password FROM users WHERE name = ?');
    $this->req->execute(array($userName));
    $userFetch = $this->req->fetchObject('Src\Model\Table\User');
    return $userFetch;
  }

}
