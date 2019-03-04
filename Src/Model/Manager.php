<?php

namespace Src\Model;

use \App\DbConfig;

abstract class Manager {

  // ATTRIBUTES

  protected $pdo;
  protected $req;
  protected $postId;
  protected $commentId;

  // FUNCTIONS

  public function __construct() {
    $this->pdo = DbConfig::getPDO();
  }

}
