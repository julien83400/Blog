<?php

namespace Src\Model\Table;

class User extends Table {

  // ATTRIBUTES

  private $name;
  private $password;

  // FUNCTIONS

  public function __construct($userAtr) {
    $this->hydrate($userAtr);
  }

  // SETTERS

  protected function setName($name) {
    $this->name = $name;
  }

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
