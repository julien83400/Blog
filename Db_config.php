<?php

class Db_config {

  private static $_dbname = 'blog';
  private static $_dbuser = 'root';
  private static $_dbpass = 'root';
  private static $_dbhost = 'localhost';

  public static function getDbIds() {
    $dbIds = [
      'dbname' => self::$_dbname,
      'dbuser' => self::$_dbuser,
      'dbpass' => self::$_dbpass,
      'dbhost' => self::$_dbhost
    ];
    return $dbIds;
  }

}
