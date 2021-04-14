<?php 

namespace App\Negocio;

class Atrasos implements DescontoInterface{
    private $salario;
    private $quantidadeDeAtraso;

    public function __construct($salario, $quantidadeDeAtraso)
    {
        $this->salario = $salario;
        $this->quantidadeDeAtraso = $quantidadeDeAtraso;
    }

    public function calcular() {
        $valorDoAtraso = $this->salario / 220;

        if ($this->quantidadeDeAtraso > 0) {
            $atraso = $this->quantidadeDeAtraso * $valorDoAtraso;
        } else {
            $atraso = 0;
        }
            
        return $atraso;
    }
}