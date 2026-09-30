<?php

// EXERCÍCIO 3 (Integrado ao Ex 8): CLASSE UTILITÁRIA ESTÁTICA
class ProcessadorPedido 
{
    public static function calcularTaxa(float $valor): float 
    {
        return $valor * 0.10;
    }
}


// CLASSE PRINCIPAL: PEDIDO (Exercícios 1, 6, 7 e 8 Juntos)
class Pedido 
{
    // EXERCÍCIO 7: 3 CONSTANTES RELACIONADAS AO MESMO ATRIBUTO (STATUS DO PEDIDO)
    
    public const STATUS_PENDENTE = "pendente";
    public const STATUS_PAGO = "pago";
    public const STATUS_ENVIADO = "enviado";

    // EXERCÍCIO 6 (Integrado ao Ex 8)
    public const TAXA_ENTREGA = 15.00;

    // EXERCÍCIO 1 (Integrado ao Ex 8)
    public static int $contadorInstancias = 0;

    // EXERCÍCIO 8
    private float $valorPedido;
    private string $status;

    // EXERCÍCIO 8: CONSTRUTOR COM PELO MENOS 1 PARÂMETRO OBRIGATÓRIO
    // Usa as constantes do Exercício 7 como valor padrão para o status.
    public function __construct(float $valorPedido, string $status = self::STATUS_PENDENTE) 
    {
        $this->valorPedido = $valorPedido;
        $this->status = $status;

        // Incrementa o contador de instâncias estático
        self::$contadorInstancias++;
    }

    //GETTERS E SETTERS (Exercício 8) 
    public function getValorPedido(): float 
    {
        return $this->valorPedido;
    }

    public function setValorPedido(float $valorPedido): void 
    {
        $this->valorPedido = $valorPedido;
    }

    public function getStatus(): string 
    {
        return $this->status;
    }

    public function setStatus(string $status): void 
    {
        $this->status = $status;
    }

    // EXERCÍCIO 6/8: MÉTODO QUE USA A CONSTANTE DE CLASSE
    public function calcularValorTotalComEntrega(): float 
    {
        return $this->valorPedido + self::TAXA_ENTREGA;
    }
}
?>
