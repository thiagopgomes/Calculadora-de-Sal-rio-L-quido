<?php

namespace App\Negocio;

class CompensacaoValeTransporte implements DescontoInterface{
    private $salario;
    private $valorValeTransporte;

    public function __construct($salario, $valorValeTransporte)
    {
        $this->salario = $salario;
        $this->valorValeTransporte = $valorValeTransporte;
    }

    public function calcular()
    {
        if ($this->valorValeTransporte > 0) {
            return $this->salario * 0.06;
        }
        
        return 0;
    }
}