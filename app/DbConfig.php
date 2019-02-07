<?php

namespace App;

use \PDO;

class DbConfig {

  private static $dbname = 'blog';
  private static $dbuser = 'root';
  private static $dbpass = 'root';
  private static $dbhost = 'localhost';

  public static function getPDO() {
    $pdo = new PDO('mysql:dbname=' . self::$dbname . ';host=' . self::$dbhost, self::$dbuser, self::$dbpass);
    return $pdo;
  }

}
