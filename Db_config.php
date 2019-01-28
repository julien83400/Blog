<?php

class Db_config {

  private static $_dbname = 'blog';
  private static $_dbuser = 'root';
  private static $_dbpass = 'root';
  private static $_dbhost = 'localhost';

  public static function getPDO() {
    $pdo = new PDO('mysql:dbname=' . self::$_dbname . ';host=' . self::$_dbhost, self::$_dbuser, self::$_dbpass);
    return $pdo;
  }

}
