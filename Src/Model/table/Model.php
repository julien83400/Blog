<?php

namespace Src\Model\Table;

abstract class Model {

  // ATTRIBUTES

  protected $id;
  protected $date_creation;

  // FUNCTIONS

  protected function dateFormat() {
    $this->date_creation = strftime('le %d/%m/%Y à %Hh%Mmin%Ss', strtotime($this->date_creation));
  }

  protected function hydrate($attributes) {
    foreach ($attributes as $key => $value) {
      $setter = 'set' . ucfirst($key);
      $this->$setter($value);
    }
  }

  // GETTERS

  public function getId() {
    return $this->id;
  }

  public function getDate() {
    return $this->date_creation;
  }

}
