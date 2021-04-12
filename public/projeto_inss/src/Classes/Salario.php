<?php

namespace App\Classes;

class Salario {
    protected $salario;

    /**
     * array
     */
    protected $beneficios;

    /**
     * array
     */
    protected $descontos;

    public function __construct($salario)
    {
        $this->beneficios = [];
        $this->descontos = [];
        $this->salario = $salario;
    }

    // calculo final
    public function calcularLiquido() {
        return ($this->salario + $this->getTotalBeneficios()) - $this->getTotalDescontos();
    }

    private function getTotalDescontos() {
        $valor = 0;

        foreach($this->getDescontos() as $desconto) {
            $valor += $desconto->getValor();
        }

        return $valor;
    }

    private function getTotalBeneficios() {
        $valor = 0;

        foreach($this->getBeneficios() as $beneficio) {
            $valor += $beneficio->getValor();
        }

        return $valor;
    }

    // Beneficio
    public function addBeneficio($beneficio) {
        array_push($this->beneficios, $beneficio);
    }

    public function getBeneficios() {
        return $this->beneficios;
    }

    // Descontos
    public function addDesconto($desconto) {
        array_push($this->descontos, $desconto);
    }

    public function getDescontos() {
        return $this->descontos;
    }
}
