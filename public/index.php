<!DOCTYPE html>
<html lang="en">
    
<head>
    <meta charset="UTF-8">
    <link href="https://fonts.googleapis.com/css?family=Oswald:200,300,400,500,600,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="recursos/css/estilo.css">
    <title>Calculadora de Salário Líquido</title>
    <link rel="icon" type="image/png" size="16x16" href="img/estacio.png"> <!-- icone no browser // corrigir imagem--> 
</head>

<body> 
    <header class="cabecalho">
        <h1></h1>
        <h2></h2>
    </header>        
    <main class="principal">
        <div class="conteudo">
            <?php require_once('menu.php'); ?> <!-- indica o caminho para o arquivo menu -->
        </div>        
    </main>
    <footer class="rodape">
        CAL.SAL <?= date('d/m/Y'); ?>        
    </footer> 
</body>

</html>