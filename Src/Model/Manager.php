<?php

namespace Src\Model;

use \App\Db_config;

class Manager {

  protected $pdo;

  public function __construct() {
    $this->pdo = Db_config::getPDO();
  }

}
