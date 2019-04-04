<?php

namespace src\model;

use \app\DbConfig;

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

  public function add($object) {
    $tableName = $this->tableName($object);
    $properties = $this->properties($object);
    $rows = $this->rows($properties);
    $values = $this->rows($properties, true);
    $parameters = $this->parameters($object, $properties);
    $sql = 'INSERT INTO ' . $tableName . $rows . ' VALUES ' . $values;
    $this->req = $this->pdo->prepare($sql);
    $result = $this->req->execute($parameters);
  }

  public function delete($id, $class) {
    $tableName = $this->tableName(null, $class);
    $sql = 'DELETE FROM ' . $tableName . ' WHERE id = ?';
    $this->req = $this->pdo->prepare($sql);
    $result = $this->req->execute(array($id));
  }

  private function tableName($object = null, $class = null) {
    if ($class !== null) {
      $explodedClass = explode('\\', $class);
      $tableName = $explodedClass[3];
      $tableName = str_replace('Manager', '', $tableName);
      $tableName = strtolower($tableName);
    }
    else {
      $objectClass = get_class($object);
      $explodedObjectClass = explode('\\', $objectClass);
      $tableName = strtolower($explodedObjectClass[3]) . 's';
    }
    return $tableName;
  }

  private function properties($object) {
    $className = get_class($object);
    $class = new \ReflectionClass($className);
    $properties = $class->getProperties();
    $propertiesArray = array();
    $i = 0;
    foreach ($properties as $property) {
      if ($property->isPrivate() === true) {
        $propertyName = $property->getName();
        $propertiesArray[$i] = $propertyName;
        $i++;
      }
    }
    return $propertiesArray;
  }

  private function rows($properties, $values = false) {
    $rows = '(';
    for ($i = 0; $i < count($properties); $i++) {
      if ($i === count($properties) - 1) {
        if ($values) {
          $rows .= ':' . $properties[$i] . ')';
        }
        else {
          $rows .= $properties[$i] . ')';
        }
      }
      else if ($values) {
        $rows .= ':' . $properties[$i] . ', ';
      }
      else {
        $rows .= $properties[$i] . ', ';
      }
    }
    return $rows;
  }

  private function parameters($object, $properties) {
    $parameters = array();
    foreach ($properties as $property) {
      $getter = 'get' . ucfirst($property);
      $parameters[$property] = $object->$getter();
    }
    return $parameters;
  }

}
