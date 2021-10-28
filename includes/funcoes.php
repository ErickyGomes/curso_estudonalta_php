<?php
    function thumb ($arq){
        $caminho = "img/fotos/$arq";
        if (is_null($arq)||!file_exists($caminho)) {
            return "img/fotos/indisponivel.png";
        } else {
            return $caminho;
        }
    }    