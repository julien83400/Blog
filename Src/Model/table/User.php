<?php

namespace Src\Model\Table;

class User extends Table {

  // ATTRIBUTES

  private $password;

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

  // GETTERS

  public function getName() {
    return $this->name;
  }

  public function getPassword() {
    return $this->password;
  }

}
