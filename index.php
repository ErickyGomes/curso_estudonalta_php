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
    <title>Listagem de jogos</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>
    <div id="corpo">
        <h1>Escolha seu jogo</h1>
        <table class="listagem">
            <?php 
                $busca = $banco-> query("SELECT * FROM jogos ORDER BY nome");
                if (!$busca) {
                    echo "<tr><td>Infelizmente a busca deu errado</td></tr>";
                } else {
                    if ($busca->num_rows == 0) {
                        echo "<tr><td>Não foi encontrado nenhum registro</td></tr>";
                    } else {
                        while ($reg=$busca->fetch_object()) {
                            $t = thumb($reg->capa);
?>
<tr>
    <td><img src="<?php echo $t;?>" alt="" class="mini"></td>
    <td><a href="detalhes.php?cod=<?php echo$reg->cod?>"><?php echo$reg->nome?></a></td>
    <td>Adm</td>
</tr>
<?php
                        }
                    }
                }
            ?>

        </table>    
    </div>

    
</body>
</html>