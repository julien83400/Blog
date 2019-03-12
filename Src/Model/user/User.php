<?php

namespace Src\Model\User;

use Src\Model\Table\Model;

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
    return $this->name;
  }

  public function getPassword() {
    return $this->password;
  }

}
