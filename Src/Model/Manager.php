<?php

namespace Src\Model;

use \App\DbConfig;

class Manager {

  protected $pdo;

  public function __construct() {
    $this->pdo = DbConfig::getPDO();
  }

}
