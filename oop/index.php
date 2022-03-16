<?php

class mainClass {


  public $name="Prantho ";

  public function setName($name){
    return $this->name=$name;
  }
  public function getName(){
    return $this->name;
  }
}

//making object
$obj=new mainClass;
echo $obj->name;
echo $obj->setName("prantho kumar ");
echo $obj->getName();
