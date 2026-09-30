<?php

// EXERCÍCIO 3: MÉTODO UTILITÁRIO ESTÁTICO
// Criamos uma classe utilitária separada (sem instanciar objetos dela).
class ProcessadorPedido 
{
    // Método estático que calcula 10% de taxa/desconto sobre um valor qualquer
    public static function calcularTaxa(float $valor): float 
    {
        return $valor * 0.10;
    }
}


// CLASSE PRINCIPAL (EXERCÍCIOS 1, 2 e 4)
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

    // EXERCÍCIO 4: MÉTODO FÁBRICA ESTÁTICO
    // Cria e devolve um objeto "Pedido" pronto com valor padrão (ex: 50.00)
    public static function criarPadrao(): self 
    {
        // Usa "new self(...)" internamente sem precisar receber parâmetros de fora
        return new self(50.00);
    }
}


// TESTES E EXECUÇÃO

// --- Teste do Exercício 1 e Exercício 2 ---
// Criação de 3 objetos com valores diferentes
$pedido1 = new Pedido(150.00);
$pedido2 = new Pedido(200.50);
$pedido3 = new Pedido(99.90);

// Exibição dos valores estáticos do lado de fora da classe usando NomeDaClasse::$suaPropriedade
echo "Total de instâncias criadas: " . Pedido::$contadorInstancias . "\n";
echo "Valor total vendido acumulado: R$ " . Pedido::$valorTotalVendido . "\n";


// --- Teste do Exercício 3 ---
// Chamada direta do método estático sem usar a palavra 'new'
$taxaExemplo = ProcessadorPedido::calcularTaxa(100.00);
echo "Taxa calculada (Ex 3): R$ " . $taxaExemplo . "\n";


// --- Teste do Exercício 4 ---
// Chamada do método fábrica para criar um objeto sem usar 'new' do lado de fora
$pedidoPadrao = Pedido::criarPadrao();

echo "Novo pedido padrão criado (Ex 4) com valor: R$ " . $pedidoPadrao->valorPedido . "\n";
echo "Total final de instâncias após o pedido padrão: " . Pedido::$contadorInstancias . "\n";

?>
