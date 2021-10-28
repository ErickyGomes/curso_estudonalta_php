<?php
    
    // variaveis com a conexao com o banco
    $host = "localhost";
    $usuario = "root";
    $senha = "";
    $bd_name = "bd_games";
    
    // cria um objeto com a conexão de banco de dados
    $banco = new mysqli($host, $usuario, $senha, $bd_name);

    // verifica se há conexão com banco de dados
    if ($banco->connect_errno) {
        echo "<p> Encontrei um erro: $banco->errno --> $banco->connect_error </p>";
        die();
    }
    
    // configurações com o banco de dados
    $banco->query("SET NAMES 'utf8'");
    $banco->query("SET character_set_connection=utf8");
    $banco->query("SET character_set_client=utf8");
    $banco->query("SET character_set_results=utf8");
