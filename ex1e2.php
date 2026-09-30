<?php

class Pedido 
{
    // Exercício 1: Contador de instâncias
    public static int $contadorInstancias = 0;

    // Exercício 2: Acumulador estático
    public static float $valorTotalVendido = 0;

    public float $valorPedido;

    public function __construct(float $valorPedido) 
    {
        $this->valorPedido = $valorPedido;

        // 1. Incrementa o contador de instâncias usando self::
        self::$contadorInstancias++;

        // 2. Acumula o valor do pedido no total estático usando self::
        self::$valorTotalVendido += $valorPedido;
    }
}

// --- Teste do Exercício 1 e Exercício 2 ---

// Criação de 3 objetos com valores diferentes
$pedido1 = new Pedido(150.00);
$pedido2 = new Pedido(200.50);
$pedido3 = new Pedido(99.90);

// Exibição dos valores estáticos do lado de fora da classe usando NomeDaClasse::$suaPropriedade
echo "Total de instâncias criadas: " . Pedido::$contadorInstancias . "\n";
echo "Valor total vendido acumulado: R$ " . Pedido::$valorTotalVendido . "\n";
