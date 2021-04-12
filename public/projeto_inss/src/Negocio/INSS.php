<?php

namespace App\Negocio;

use App\Enum\FaixaSalario;
use App\Enum\AliquotaINSS;

class INSS implements DescontoInterface {
    private $salario;

    public function __construct($salario)
    {
        $this->salario = $salario;
    }

    private function getAliquota() {
        $aliquota = 0;
        
        if ($this->salario <= FaixaSalario::PRIMEIRA_FAIXA) {
            $aliquota = AliquotaINSS::PRIMEIRA_FAIXA;
        } elseif ($this->salario <= FaixaSalario::SEGUNDA_FAIXA) {
            $aliquota = AliquotaINSS::SEGUNDA_FAIXA;
        } elseif ($this->salario <= FaixaSalario::TERCEIRA_FAIXA) {
            $aliquota = AliquotaINSS::TERCEIRA_FAIXA;
        } elseif ($this->salario <= FaixaSalario::QUARTA_FAIXA) {
            $aliquota = AliquotaINSS::QUARTA_FAIXA;
        }

        return $aliquota;
    }

    public function calcular() {
        $aliquota = $this->getAliquota();
        
        return floatval($this->salario * $aliquota);
    }
}
