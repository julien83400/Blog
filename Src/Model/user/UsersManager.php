<?php

namespace Src\Model\User;

use Src\Model\Manager;

class UsersManager extends Manager {

  // FUNCTIONS

  public function user($userName) {
    $this->userName = $userName;
    $this->req = $this->pdo->prepare('SELECT name, password FROM users WHERE name = ?');
    $this->req->execute(array($this->userName));
    $userFetch = $this->req->fetchObject('Src\Model\User\User');
    return $userFetch;
  }

  public function userNameCount($userName) {
    $this->userName = $userName;
    $this->req = $this->pdo->prepare('SELECT COUNT(*) AS nb_username FROM users WHERE name = ?');
    $this->req->execute(array($this->userName));
    $result = $this->req->fetch();
    return $result;
  }

}
