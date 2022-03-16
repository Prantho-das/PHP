<?php

class constructorClass
{


  public $name;

  public function __construct($name)
  {
    $this->name = $name;
  }

  public function getName()
  {
    return $this->name;
  }
}

//making object
$obj = new constructorClass("prantho kumar ");
echo $obj->getName();
