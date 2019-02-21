<?php

namespace Src\Model;

use \App\DbConfig;

abstract class Manager {

  // ATTRIBUTES

  protected $pdo;
  protected $req;
  protected $postId;

  // FUNCTIONS

  public function __construct() {
    $this->setPDO(DbConfig::getPDO());
  }

  // SETTERS

  private function setPDO($pdo) {
    $this->pdo = $pdo;
  }

  protected function setReq($req) {
    $this->req = $req;
  }

  protected function setPostId($postId) {
    $this->postId = $postId;
  }

}
