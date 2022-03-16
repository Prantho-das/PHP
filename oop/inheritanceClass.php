<?php

class parentClass
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

class inheritanceClass extends parentClass{
  public function __construct($name)
  {
    parent::__construct($name);
  }
}

//making object
$obj = new inheritanceClass("prantho kumar ");
echo $obj->getName();
