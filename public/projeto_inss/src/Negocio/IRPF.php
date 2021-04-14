<?php

namespace App\Negocio;


use App\Enum\AliquotaIRPF;
use App\Enum\FaixaIRPF;
use App\Enum\ValorADeduzirIRPF;


class IRPF implements DescontoInterface {
    private $salario;

    public function __construct($salario)
    {
        $this->salario = $salario;
    }

    private function getAliquota() {
        $aliquota = 0;
        
        if ($this->salario > FaixaIRPF::PRIMEIRA_FAIXA) {
            $aliquota = AliquotaIRPF::PRIMEIRA_FAIXA;
        } elseif ($this->salario > FaixaIRPF::SEGUNDA_FAIXA) {
            $aliquota = AliquotaIRPF::SEGUNDA_FAIXA;
        } elseif ($this->salario > FaixaIRPF::TERCEIRA_FAIXA) {
            $aliquota = AliquotaIRPF::TERCEIRA_FAIXA;
        } elseif ($this->salario > FaixaIRPF::QUARTA_FAIXA) {
            $aliquota = AliquotaIRPF::QUARTA_FAIXA;
        }

        return $aliquota;
    }

    private function getDeducao() {
        $aliquota = $this->getAliquota();
        $valorDeducao = 0;

        if ($aliquota == AliquotaIRPF::PRIMEIRA_FAIXA) {
            $valorDeducao = ValorADeduzirIRPF::PRIMEIRA_FAIXA;
        } elseif ($aliquota == AliquotaIRPF::SEGUNDA_FAIXA) {
            $valorDeducao = ValorADeduzirIRPF::SEGUNDA_FAIXA;
        } elseif ($aliquota == AliquotaIRPF::TERCEIRA_FAIXA) {
            $valorDeducao = ValorADeduzirIRPF::TERCEIRA_FAIXA;
        } elseif ($aliquota == AliquotaIRPF::QUARTA_FAIXA) {
            $valorDeducao = ValorADeduzirIRPF::QUARTA_FAIXA;
        }

        return $valorDeducao;
    }


    public function calcular() {
        $aliquota = $this->getAliquota();
        $valorDeducao = $this->getDeducao();
        
        return floatval($this->salario * $aliquota - $valorDeducao);
    }
}
