<?php
    function thumb ($arq){
        $caminho = "img/fotos/$arq";
        if (is_null($arq)||!file_exists($caminho)) {
            return "img/fotos/indisponivel.png";
        } else {
            return $caminho;
        }
    }  
    function voltar(){
        return "<a href='index.php'><i class='material-icons'>arrow_back</i></a>";
    }  
    function msg_sucesso($m){
        $resp = "<div class='sucesso'><span class='material-icons'>check_circle</span>$m</div>";
        return $resp;
    }
    function msg_aviso($m){
        $resp = "<div class='aviso'><span class='material-icons'>info</span>$m</div>";
        return $resp;
    }
    function msg_erro($m){
        $resp = "<div class='erro'><span class='material-icons'>error</span>$m</div>";
        return $resp;
    }