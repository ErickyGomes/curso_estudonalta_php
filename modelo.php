<?php 
    require_once "includes/banco.php";
    require_once "includes/funcoes.php";
    require_once "includes/login.php";
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>curso de PHP</title>
    <link rel="stylesheet" href="css/estilo.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
    <?php
        include_once "topo.php";
        $cod = $_GET['cod'] ?? 0;
        $busca = $banco->query("SELECT * FROM jogos WHERE cod='$cod'");    
    ?>
    <div id="corpo">
        <h1></h1> 
        
    <?php echo voltar()?>     
    </div>
    <?php include_once "rodape.php";?>
</body>
</html>