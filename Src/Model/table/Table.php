<?php

namespace Src\Model\Table;

abstract class Table {

  // ATTRIBUTES

  protected $id;
  protected $date;
  protected $name;

  // FUNCTIONS

  protected function dateFormat() {
    $this->date = strftime('le %d/%m/%Y à %Hh%Mmin%Ss', strtotime($this->date));
  }

  protected function hydrate($attributes) {
    foreach ($attributes as $key => $value) {
      $setter = 'set' . ucfirst($key);
      $this->$setter($value);
    }
  }

  // SETTERS

  private function setName($name) {
    $this->name = $name;
  }

  // GETTERS

  public function getId() {
    return $this->id;
  }

  public function getDate() {
    return $this->date;
  }

}
