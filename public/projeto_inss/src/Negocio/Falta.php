<?php 

namespace App\Negocio;

class Falta implements DescontoInterface{
    private $salario;
    private $quantidadeDeFaltas;

    public function __construct($salario, $quantidadeDeFaltas)
    {
        $this->salario = $salario;
        $this->quantidadeDeFaltas = $quantidadeDeFaltas;
    }

    public function calcular() {
        $valorDaFalta = $this->salario / 30;

        if ($this->quantidadeDeFaltas > 0) {
            $faltas = $this->quantidadeDeFaltas * $valorDaFalta;
        } else {
            $faltas = 0;
        }
            
        return $faltas;
    }
}