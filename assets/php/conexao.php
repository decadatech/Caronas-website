<?php
    $servidor = "localhost";
    $usuario = "gagigante";
    $senha = "290501";
    $banco = "bd_caronas";

    $conexao = mysqli_connect($servidor, $usuario, $senha, $banco);
    mysqli_set_charset($conexao,"utf8");
    
    if(!$conexao){

        die("Falha na conexao: ". 
            mysqli_connect_error());
    }

?>
