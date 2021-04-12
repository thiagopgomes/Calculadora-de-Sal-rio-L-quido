<?php

namespace App\Service;

abstract class Calopsita {
    protected $descricao;
    protected $valor;

    public function __construct($descricao, $valor)
    {
        $this->descricao = $descricao;
        $this->valor = $valor;
    }
    
    public function getDescricao()
    {
        return $this->descricao;
    }

    public function getValor()
    {
        return $this->valor;
    }
}