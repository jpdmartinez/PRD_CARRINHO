<?php

require_once("Class/Product.php");
require_once("Class/Cart.php");

$createdProducts = [
  0 => new Product('Camiseta', 0, 59.90, 10),
  1 => new Product('Calça Jeans', 1, 129.90, 5),
  2 => new Product('Tênis', 2, 199.90, 3)
];

$Cart1 = new Cart($createdProducts);

function showStock(array $createdProducts): void{
  echo "<h2> Estoque</h2>";
  foreach ($createdProducts as $product){
    echo "{$product->getName()} || {$product->getStock()}<br>";
  }
  echo "<br>";
}

showStock($createdProducts);

echo $Cart1->addItem(0, 3);
echo $Cart1->addItem(1, 2);
echo $Cart1->addItem(2, 1);

showStock($createdProducts);

echo $Cart1->addItem(1,10);
echo $Cart1->removeItem(0);

showStock($createdProducts);

$Cart1->listItens();

echo $Cart1->applicateDiscount("DESCONTO10");

