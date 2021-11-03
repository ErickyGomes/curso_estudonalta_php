<?php 
    require_once "includes/banco.php";
    require_once "includes/funcoes.php";
    require_once "includes/login.php";
    $ordem = $_GET['o'] ?? "n";
    $chave = $_GET['c'] ?? "";
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listagem de jogos</title>
    <link rel="stylesheet" href="css/estilo.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
    <div id="corpo">
        <?php include_once "topo.php";?>
        <h1>Escolha seu jogo</h1>
        <form action="index.php" id="busca" method="get">
            Ordenar: 
            <a href="index.php?o=n&c=<?php echo $chave;?>">Nome</a>  | 
            <a href="index.php?o=p&c=<?php echo $chave;?>">Produtora</a> | 
            <a href="index.php?o=n1&c=<?php echo $chave;?>">Nota Alta</a> | 
            <a href="index.php?o=n2&c=<?php echo $chave;?>">Nota Baixa</a> |
            <a href="index.php">Mostrar todos</a> |
            Busca: <input type="text" name="c" size="10" maxlength="40">
            <input type="submit" value="Ok">
        </form>
        <table class="listagem">
            <?php 
                $q = "SELECT j.cod, j.nome, g.genero, p.produtora, j.capa FROM jogos j join generos g on j.genero = g.cod join produtoras p on j.produtora = p.cod ";
                
                if (!empty($chave)) {
                    $q .= "WHERE j.nome like '%$chave%' OR p.produtora like '%$chave%' OR g.genero like '%$chave%'";
                }

                switch ($ordem) {
                    case 'p':
                        $q .= "ORDER BY p.produtora";
                        break;
                    case 'n1':
                        $q .= "ORDER BY j.nota DESC";
                        break;
                    case 'n2':
                        $q .= "ORDER BY j.nota";
                        break;
                    
                    default:
                    $q .= "ORDER BY j.nome";
                        break;
                }

                $busca = $banco-> query($q);
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
    <td>
        <a href="detalhes.php?cod=<?php echo$reg->cod?>"><?php echo$reg->nome?></a> <?php echo "[$reg->genero]" ?> <br><?php echo $reg->produtora?>
    </td>
    <?php 
            if (is_admin()) {
                echo "<td>";
                echo "<i class='material-icons'>add_circle</i>";
                echo "<i class='material-icons'>edit</i>";
                echo "<i class='material-icons'>delete</i>";
            }elseif(is_editor()){
                echo "<td><i class='material-icons'>edit</i>";
            }
        ?> 
</tr>
<?php
                        }
                    }
                }
            ?>

        </table>    
    </div>
<?php include_once "rodape.php";?>
    
</body>
</html>