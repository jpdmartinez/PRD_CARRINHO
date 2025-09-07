# Carrinho de Compras em PHP

Projeto desenvolvido para a disciplina **Design Patterns & Clean Code**.
Objetivo: simular um carrinho de compras simples em PHP, aplicando boas práticas de programação (**PSR-12**, **DRY**, **KISS**) sem uso de banco de dados.

---

## Autores

* João Pedro Duarte Martinez — RA: 1993686
* João Pedro Belarmino Torres — RA: 2007848

---

## Como executar o projeto

1. Instale e configure o **XAMPP**.
2. Copie a pasta `PRD_CARRINHO/` para o diretório `htdocs/` do XAMPP.
3. Inicie o servidor Apache no painel do XAMPP.
4. Acesse no navegador:

```
http://localhost/PRD_CARRINHO/index.php
```

---

## Funcionalidades Implementadas

* [x] **Adicionar item ao carrinho**

  * Valida se o produto existe.
  * Verifica se há estoque suficiente.
  * Atualiza o carrinho e reduz o estoque.

* [x] **Remover item do carrinho**

  * Verifica se o item está no carrinho.
  * Remove e devolve estoque ao produto.

* [x] **Listar itens do carrinho**

  * Mostra produtos, quantidades, subtotal e total.

* [x] **Calcular total**

  * Soma todos os subtotais.

* [x] **Aplicar cupom de desconto**

  * `DESCONTO10` → reduz 10% no valor total.

---

## Casos de Uso

### Caso 1 — Adicionar produto válido

Entrada: `id=0`, `quantidade=3`
Resultado: produto adicionado, estoque atualizado.

### Caso 2 — Adicionar além do estoque

Entrada: `id=3`, `quantidade=10`
Resultado: mensagem → **"Estoque insuficiente."**

### Caso 3 — Remover produto do carrinho

Entrada: `id=0`
Resultado: produto removido, estoque restaurado.

### Caso 4 — Aplicar cupom de desconto

Entrada: `DESCONTO10`
Resultado: total reduzido em **10%**.


---

## Exemplo de Execução (`index.php`)

Produto Camiseta adicionado com sucesso!
Produto Calça Jeans adicionado com sucesso!
Produto Tênis adicionado com sucesso!

Estoque insuficiente!
Produto Camiseta removido com sucesso!

Carrinho
Produto: Calça Jeans || Quantidade: 2 || Subtotal: R$ 259.8
Produto: Tênis || Quantidade: 1 || Subtotal: R$ 199.9
Total: R$ 459.7
Total com disconto: R$ 413.73
```
