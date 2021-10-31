<?php 
    require_once "includes/banco.php";
    require_once "includes/funcoes.php";
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>curso de PHP</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>
    <?php
        include_once "topo.php";
        $cod = $_GET['cod'] ?? 0;
        $busca = $banco->query("SELECT * FROM jogos WHERE cod='$cod'");    
    ?>
    <div id="corpo">
        <h1>Detalhes do Jogo</h1> 
        
        <table class='detalhes'>
            <?php
            if (!$busca) {
                echo "<tr><td>Busca falhou!</td></tr>";
            } else {
                if ($busca-> num_rows ==1) {
                    $reg = $busca->fetch_object();
                    $t = thumb($reg->capa);
                    ?>
                    <tr>
                        <td rowspan='3'><img src="<?php echo $t;?>" class="full" alt=""></td>
                        <td><h2><?php echo $reg->nome?></h2><p><?php echo "Nota: ". number_format($reg->nota,1)." / 10.0"?></p></td>
                    </tr>
                    <tr><td><?php echo $reg->descricao?></td></tr>
                    <tr><td>Adm</td></tr>
                <?php
                }else{
                    echo "<tr><td>Nenhum dado encontrado!</td></tr>";
                }
            }



            ?>
        

        </table> 
        <a href="index.php"><img src="img/icones/icoback.png" alt=""></a>  
    </div>
    <?php include_once "rodape.php";?>
</body>
</html>