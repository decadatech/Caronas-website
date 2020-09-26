<?php
    include_once "../../../../assets/php/conexao.php";
    include_once "../login/verificado-login-for-php.php";

	$mensagem =  mysqli_real_escape_string($conexao, trim(nl2br($_POST["message"])));

    $queryinsere = "UPDATE `tb04_sobre` SET `tb04_mensagem` = '".$mensagem."' WHERE 1";
    $resultadoinsere = mysqli_query($conexao, $queryinsere);	
?>