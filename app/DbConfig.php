<?php

namespace app;

use \PDO;

abstract class DbConfig {

  // ATTRIBUTES

  const DB_NAME = 'blog';
  const DB_HOST = 'localhost';
  const DB_USER = 'root';
  const DB_PASS = 'root';

  // FUNCTIONS

  public static function getPDO() {
    $pdo = new PDO('mysql:dbname=' . self::DB_NAME . ';host=' . self::DB_HOST, self::DB_USER, self::DB_PASS);
    return $pdo;
  }

}
