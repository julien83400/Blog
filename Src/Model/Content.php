<?php

namespace Src\Model;

class Content {

  protected $id;
  protected $date;

  protected function dateFormat($date) {
    $this->date = strftime('le %d/%m/%Y à %Hh%Mmin%Ss',strtotime($date));
  }

  public function getId() {
    return $this->id;
  }

  public function getDate() {
    return $this->date;
  }

}
