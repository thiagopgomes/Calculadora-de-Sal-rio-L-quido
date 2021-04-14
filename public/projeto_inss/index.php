<div class="titulo">Meus Testes</div>

<form action="#" method="POST">
    <div>
        <label for="salarioBase">Salario base</label>
        <input type=value<?= $_POST['salarioBase'] ?? 10 ?>
        name="salarioBase" id="salarioBase">
    </div>
    <div>
        <label for="valeTransporte">VT</label>
        <input type=value<?= $_POST['valeTransporte'] ?? 10 ?>
        name="valeTransporte" id="valeTransporte">
    </div>
    <div>
        <label for="faltas">Faltas</label>
        <input type=value<?= $_POST['faltas'] ?? 10 ?>
        name="faltas" id="faltas">
    </div>
    <div>
        <label for="atrasos">Atrasos</label>
        <input type=value<?= $_POST['atrasos'] ?? 10 ?>
        name="atrasos" id="atrasos">
    </div>
    <button>Calcular salário</button>
</form>

<?php

require_once "vendor/autoload.php";

use App\Classes\Salario;
use App\Service\Beneficio;
use App\Service\Desconto;
use App\Negocio\Falta;
use App\Negocio\Atrasos;
use App\Negocio\INSS;
use App\Negocio\CompensacaoValeTransporte;
use App\Negocio\IRPF;



// Entradas do programa
$salarioBase = floatval($_POST['salarioBase']);
$valeTransporte = floatval($_POST['valeTransporte']);
$quantidadeDeFaltas = intval($_POST['faltas']);
$atrasos = intval($_POST['atrasos']);

// Calculadora de Salário
$salario = new Salario($salarioBase);

// Benefícios
$salario->addBeneficio(new Beneficio("vale Transporte", $valeTransporte));


// Descontos
$inss = new INSS($salarioBase);
$salario->addDesconto(new Desconto("INSS", $inss->calcular()));


$compensacaoValeTransporte = new CompensacaoValeTransporte($salarioBase, $valeTransporte);
$salario->addDesconto(new Desconto("6% do Salário", $compensacaoValeTransporte->calcular()));

$falta = new Falta($salarioBase, $quantidadeDeFaltas);
$salario->addDesconto(new Desconto("faltas", $falta->calcular()));

$atraso = new Atrasos($salarioBase, $atrasos);
$salario->addDesconto(new Desconto("Atrasos", $atraso->calcular()));

$irpf = new IRPF($salarioBase);
$salario->addDesconto(new Desconto("Imposto de Renda", $irpf->calcular()));


// Salário Líquido
$salarioLiquido = $salario->calcularLiquido();

// Descontos
$descontos = $salario->getDescontos();

echo "Descontos: <br/>";
foreach($descontos as $desconto) {
    if ($desconto->getValor() > 0) {
        echo "Total {$desconto->getDescricao()}: R$ " . number_format($desconto->getValor(), 2, ",", ".") . '<hr>';
    }
}

echo "<br/><br/>";

// Benefícios
$beneficios = $salario->getBeneficios();
echo "Benefícios: <br/>";

foreach($beneficios as $beneficio) {
    echo "Total {$beneficio->getDescricao()}: R$ " . number_format($beneficio->getValor(), 2, ",", ".") . '<hr>';
}

echo "Salário: <br/>";
// Valor líquido
echo "O valor liquido a receber mais benefícios é: R$ " . number_format($salarioLiquido, 2, ",", ".");
