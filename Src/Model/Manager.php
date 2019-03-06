<?php

namespace Src\Model;

use \App\DbConfig;

abstract class Manager {

  // ATTRIBUTES

  protected $pdo;
  protected $req;
  protected $postId;
  protected $commentId;
  protected $userName;

  // FUNCTIONS

  public function __construct() {
    $this->pdo = DbConfig::getPDO();
  }

  // fonction UPDATE
  // fonction delete
  // fonction save
  // fonction findoneby recherche par id
  // fonction find by recherche par type

}
