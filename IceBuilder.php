<?php

interface Builder {
  public function reset();
  public function setCornet();
  public function setBallNumber();
  public function setSupplements();
}

class IceCream {
  private $parts = [];
  private int $price = 0;
}

class IceCreamBuilder implements Builder{
  private IceCream $iceCream;

  public function __construct() {
    $this->reset();
  }

  public function reset() {
    $this->iceCream = new IceCream();
  }

  public function setBallNumber(int $ballNumber) :void{
    $this->iceCream->parts[] = $ballNumber;
    $this->iceCream->price += $ballNumber;

  }

  public function setCornet(string $cornetType) :self{
    $this->iceCream->parts[] = $cornetType;
    $this->iceCream->price += 1;
    return $this;

  }

  public function setFlavor(string $flavor) {
    $this->iceCream->parts[] = $flavor;
    $this->iceCream->price += 0.5;
    return $this;
  }

  public function getProduct() {
    $result = $this->iceCream;
    $this->reset();
    return "Product parts: " . implode(', ', $result->parts) . " " . $result->price . "\n\n";
  }

  public function setSupplements(){
    
  }
}


class Director {
  private Builder $builder;

  public function setBuilder(Builder $builder) {
    return $this->builder = $builder;
  }

  public function birthdayIceCream() {
    // 3 boules, 3 gouts..., Supplement chantilly
    $this->builder->setCornet("gauffre")->setBallNumber(3)->setFlavor("chocolat");
  }
}