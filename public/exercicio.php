<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://fonts.googleapis.com/css?family=Oswald:200,300,400,500,600,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="recursos/css/estilo.css">
    <link rel="stylesheet" href="recursos/css/exercicio.css">
    <title>Exercício</title>
    <link rel="icon" type="image/png" size="16x16" href="img/estacio.png"> <!-- icone no browser -->
</head>

<body class="exercicio">

    <header class="cabecalho">
        <h1></h1>
        <h2>Realizando o cálculo</h2>
    </header> 

    <nav class="navegacao"> 
        <a href=<?= "/{$_GET['dir']}/{$_GET['file']}.php" ?> 
         class="verde"> Sem formatação</a>
        <a href="index.php" class="vermelho"> Voltar</a>
    </nav>

    <main class="principal">
        <div class="conteudo">
            <?php
                include(__DIR__ . "/{$_GET['dir']}/{$_GET['file']}.php");
            ?>
        </div>
    </main>

    <footer class="rodape">
        CALC.SAL <?= date('d/m/Y'); ?> 
    </footer>  

</body>

</html>