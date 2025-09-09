<?php

require_once("Class/Product.php");

class Cart{

  private array $createdProducts;
  private array $itens = [];
  private Product $product;
  private float $total;
  private float $discount;

  public function __construct(array $createdProducts){
    $this->createdProducts = $createdProducts;
    $this->total = 0;
    $this->discount = 0;
  }

  public function addItem(int $productId, int $quantity): string {
    if(!isset($this->createdProducts[$productId])){
      return "Produto não encontrado!<br>";
    }

    $product = $this->createdProducts[$productId];

    if($product->getStock() < $quantity){
      return "Estoque insuficiente!<br>";
    }

    if(isset($this->itens[$productId])){
      $this->itens[$productId]['quantity'] += $quantity;
      return "Carrinho atualizado!<br>";
    }

    if(!isset($this->itens[$productId])){
      $this->itens[$productId] = [
        'product' => $product,
        'quantity' => $quantity
      ];
    }

    $this->createdProducts[$productId]->setStock($this->createdProducts[$productId]->getStock() - $quantity);
    return "Produto {$this->createdProducts[$productId]->getName()} adicionado com sucesso!<br>";
  }

  public function removeitem($productId): string {
    if(!isset($this->itens[$productId])){
      return "Produto não encontrado no Carrinho!";
    }

    $remove = $this->itens[$productId];
    $this->createdProducts[$productId]->setStock($this->createdProducts[$productId]->getStock() + $remove['quantity']);
    unset($this->itens[$productId]);

    return "Produto {$this->createdProducts[$productId]->getName()} removido com sucesso!<br>";
  }

  public function listItens(): void {
    if(empty($this->itens)){
      echo "O Cart está vazio<br>";
    }else {
      echo "<h2>Cart</h2>";
      foreach ($this->itens as $item) {
        $price = $item['product']->getPrice() * $item['quantity'];
        echo "Produto: {$item['product']->getName()} || Quantidade: {$item['quantity']} || Subtotal:  R$ {$price}<br>";
      }
      echo "<b>Total: R$ {$this->calculateTotal()}</b><br>";
    }
  }

  public function applicateDiscount(string $coupom): string{
    if($coupom == "DESCONTO10"){
      $this->discount = $this->calculateTotal() * 0.9;
      return "<b>Total com disconto: R$ {$this->discount}</b><br>";
    }
    return "Este cupom não é válido!";
  }
  
  public function calculateTotal(): float{
    $total = 0;
    foreach ($this->itens as $item) {
      $price = $item['product']->getPrice() * $item['quantity'];
      $total +=$price;
    }
    return $total;
  }
  
}