<?php

namespace src\model\user;

use src\model\Model;

class User extends Model {

  // ATTRIBUTES

  private $password;
  private $name;

  // FUNCTIONS

  public function __construct($hydrate = false, $userAtr = null) {
    if ($hydrate === true) {
      $this->hydrate($userAtr);
    }
  }

  // SETTERS

  protected function setPassword($password) {
    $this->password = $password;
  }

  protected function setName($name) {
    $this->name = $name;
  }

  // GETTERS

  public function getName() {
    return htmlspecialchars($this->name);
  }

  public function getPassword() {
    return htmlspecialchars($this->password);
  }

}
