<?php

// EXERCÍCIO 8: INCLUSÃO DO ARQUIVO PRÓPRIO COM require_once
require_once 'ex7e8.php';

// TESTES DO EXERCÍCIO 7 E EXERCÍCIO 8

echo "=== EXERCÍCIO 7 e 8 — TESTES DA CLASSE PEDIDO ===\n\n";

// 1. Criando 2 objetos utilizando as CONSTANTES para preencher o status (sem texto solto)
$pedido1 = new Pedido(150.00, Pedido::STATUS_PENDENTE);
$pedido2 = new Pedido(250.00, Pedido::STATUS_PAGO);

// 2. Alterando o status do pedido 1 utilizando a constante do Exercício 7
$pedido1->setStatus(Pedido::STATUS_ENVIADO);

// 3. Exibindo informações usando Getters
echo "Pedido 1 - Status Atual: " . $pedido1->getStatus() . "\n";
echo "Pedido 1 - Valor com Entrega (usando constante): R$ " . $pedido1->calcularValorTotalComEntrega() . "\n\n";

echo "Pedido 2 - Status Atual: " . $pedido2->getStatus() . "\n";

// 4. Testando o Método Utilitário Estático (Exercício 3 / Bloco 5)
$taxaPedido2 = ProcessadorPedido::calcularTaxa($pedido2->getValorPedido());
echo "Pedido 2 - Taxa calculada via classe utilitária: R$ " . $taxaPedido2 . "\n\n";

// 5. Exibindo o contador de instâncias estático (Exercício 1 / Bloco 5)
echo "Total de instâncias criadas até agora: " . Pedido::$contadorInstancias . "\n";

?>
