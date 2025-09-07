<?php

require_once("Class/Product.php");
require_once("Class/Carrinho.php");

$createdProducts = [
  0 => new Product('Camiseta', 0, 59.90, 10),
  1 => new Product('Calça Jeans', 1, 129.90, 5),
  2 => new Product('Tênis', 2, 199.90, 3)
];

$carrinho1 = new Carrinho($createdProducts);

function showStock(array $createdProducts): void{
  echo "<h2> Estoque</h2>";
  foreach ($createdProducts as $product){
    echo "{$product->getName()} || {$product->getStock()}<br>";
  }
  echo "<br>";
}

showStock($createdProducts);

echo $carrinho1->addItem(0, 3);
echo $carrinho1->addItem(1, 2);
echo $carrinho1->addItem(2, 1);

showStock($createdProducts);

echo $carrinho1->addItem(1,10);
echo $carrinho1->removeItem(0);

showStock($createdProducts);

$carrinho1->listItens();

echo $carrinho1->applicateDiscount("DESCONTO10");

