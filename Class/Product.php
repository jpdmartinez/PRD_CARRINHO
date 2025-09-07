<?php

class Product{

  public string $name;
  public int $id;
  public float $price;
  public int $stock;

  public function __construct(string $name, int $id, float $price, int $stock) {
    $this->name = $name;
    $this->id = $id;
    $this->price = $price;
    $this->stock = $stock;
  }

  public function setName(string $name): void {
    if(empty($name)){
      $this-> name = "Produto sem nome";
    }
    $this->name = $name;
  }

  public function getName(): string {
    return $this->name;
  }

  public function setId(int $id): void {
    if($id < 0){
      echo "Id do produto não pode ser menor do que zero";
    } else {
      $this->id = $id;
    }
  }

  public function getId(): int {
    return $this->id;
  }

  public function setPrice(float $price): void {
    if($price < 0){
      echo "Preço não pode ser menor do que zero";
    } else {
      $this->price = $price;
    }
  }

  public function getPrice(): float {
    return $this->price;
  }

  public function setStock(int $stock): void {
    if($stock < 0){
      echo "Estoque não pode ser menor do que zero!";
    } else{
      $this->stock = $stock;
    }
  }

  public function getStock():int {
    return $this->stock;
  }
  
}