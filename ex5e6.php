<?php

/*
EXERCÍCIO 5 — EXPLICAÇÃO DAS DIFERENÇAS ENTRE self::$algo E $this->algo

1. self::$algo (Contexto Estático / Classe):
   - Refere-se a propriedades ou métodos ESTÁTICOS da própria CLASSE.
   - O valor é COMPARTILHADO entre todas as instâncias (objetos).
   - Não depende da criação de um objeto com "new" para existir.

2. $this->algo (Contexto de Instância / Objeto):
   - Refere-se a propriedades ou métodos de um OBJETO ESPECÍFICO.
   - Cada objeto criado tem seu próprio valor separado para essa variável.
   - Só existe dentro de métodos de instância (não funciona em métodos static).

ERRO PROPOSITAL REPRODUZIDO (O que acontece ao tentar usar $this dentro de um método static):
Código com erro:
    public static function metodoComErro() {
        return $this->valorPedido; // Tenta usar $this em contexto estático
    }

Erro gerado no PHP / Navegador:
    Fatal error: Uncaught Error: Using "$this" when not in object context in /caminho/arquivo.php

*/

class Pedido 
{
    // EXERCÍCIO 6 — CONSTANTE DE CLASSE
    // 1. Nomeada em MAIUSCULO_COM_UNDERLINE
    // 2. Representa um valor fixo no domínio do pedido
    public const TAXA_ENTREGA = 15.00;

    // Exercício 1: Contador de instâncias
    public static int $contadorInstancias = 0;

    // Exercício 2: Acumulador estático
    public static float $valorTotalVendido = 0;

    public float $valorPedido;

    public function __construct(float $valorPedido) 
    {
        $this->valorPedido = $valorPedido;

        // Incrementa contador de instâncias
        self::$contadorInstancias++;

        // Acumula valor do pedido
        self::$valorTotalVendido += $valorPedido;
    }

    // EXERCÍCIO 5 — CÓDIGO CORRIGIDO
    // Para acessar propriedades da instância ($this->valorPedido), o método NÃO pode ser static.
    public function obterValorComDesconto(float $desconto): float 
    {
        // Aqui o uso de $this-> está correto porque o método é de instância (não static)
        return $this->valorPedido - $desconto;
    }

    // EXERCÍCIO 6 — USO DA CONSTANTE DENTRO DE UM MÉTODO
    // A constante é utilizada dentro do cálculo do valor total com a entrega.
    // Usamos self::NOME_DA_CONSTANTE para acessá-la dentro da classe.
    public function calcularValorTotalComEntrega(): float 
    {
        return $this->valorPedido + self::TAXA_ENTREGA;
    }

    // Exercício 4: Método Fábrica
    public static function criarPadrao(): self 
    {
        return new self(50.00);
    }
}


// TESTES E EXECUÇÃO (EXERCÍCIOS 5 E 6)

$pedido1 = new Pedido(100.00);

echo "--- TESTE EXERCÍCIO 5 (Código Corrigido) ---\n";
echo "Valor do pedido com R$ 10 de desconto: R$ " . $pedido1->obterValorComDesconto(10.00) . "\n\n";

echo "--- TESTE EXERCÍCIO 6 (Constante de Classe) ---\n";
echo "Valor original do pedido: R$ " . $pedido1->valorPedido . "\n";
echo "Valor da taxa de entrega (constante): R$ " . Pedido::TAXA_ENTREGA . "\n";
echo "Valor total final com entrega: R$ " . $pedido1->calcularValorTotalComEntrega() . "\n";
