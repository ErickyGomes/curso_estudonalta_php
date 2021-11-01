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
    <style>
        div#corpo{
            width: 300px;
            font-size:15pt;
        }
        td{
            padding: 6px;
        }
    </style>
    <div id="corpo">
    <?php
        $u = $_POST['usuario'] ?? null;
        $s = $_POST['senha'] ?? null;
    
        if (is_null($u) || is_null($s)) {
            require_once "user-login-form.php";
        }else{
            $q = "SELECT usuario,nome,senha,tipo FROM usuarios WHERE usuario = '$u' LIMIT 1";
            $busca = $banco->query($q);
            if (!$busca) {
                echo msg_erro('Falha ao acessar o banco!');
            }else {
                if ($busca->num_rows > 0) {
                    $reg = $busca->fetch_object();
                    if (testarHash($s,$reg->senha)) {
                        echo msg_sucesso('Logado com sucesso');
                        $_SESSION['user'] = $reg->usuario;
                        $_SESSION['nome'] = $reg->nome;
                        $_SESSION['tipo'] = $reg->tipo;
                    } else {
                        echo msg_erro('Usuario ou senha incorreto.');
                    } 
                } else {
                    echo msg_erro('Usuario não encontrado.'); 
                }
            }
        }
    echo voltar();
    ?>
    
    </div>

</body>
</html>