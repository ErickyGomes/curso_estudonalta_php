<?php
    session_start();
    if(!isset($_SESSION['user'])){
        $_SESSION['user'] = "";
        $_SESSION['nome'] = "";
        $_SESSION['tipo'] = "";
    }
    
    function gerarHash($senha){
        $txt = cripto($senha);
        $hash = password_hash($txt,PASSWORD_DEFAULT);
        return $hash;
    }
    function testarHash($senha,$hash){
        $ok = password_verify(cripto($senha),$hash);
        return $ok;
    }
    function cripto($senha){
        $c = '';
        for ($pos = 0; $pos < strlen($senha); $pos++) { 
            $letra = ord($senha[$pos]) + 1;
            $c .= chr($letra);  
        }
        return $c;
    }
    function logout(){
        unset($_SESSION['user']);
        unset($_SESSION['nome']);
        unset($_SESSION['tipo']);
    }
    