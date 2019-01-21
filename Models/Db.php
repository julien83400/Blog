<?php

namespace Models;

use \Db_config;
use \PDO;

class Db {

  private $_dbname;
  private $_dbuser;
  private $_dbpass;
  private $_dbhost;
  private $_pdo;

  public function __construct() {
    $dbIds = Db_config::getDbIds();
    $this->setDbIds($dbIds);
    $this->setPDO();
  }

  private function setDbIds($dbIds) {
    $this->_dbname = $dbIds['dbname'];
    $this->_dbuser = $dbIds['dbuser'];
    $this->_dbpass = $dbIds['dbpass'];
    $this->_dbhost = $dbIds['dbhost'];
  }

  private function setPDO() {
    $this->_pdo = new PDO('mysql:dbname=' . $this->_dbname . ';host=' . $this->_dbhost,
    $this->_dbuser, $this->_dbpass);
  }

  public function getAllPosts() {
    $req = $this->_pdo->query('SELECT * FROM posts ORDER BY date DESC');
    $datas = $req->fetchAll();
    return $datas;
  }

}
