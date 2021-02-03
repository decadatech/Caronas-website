<?php
    include_once "../../../../assets/php/conexao.php";

	$usuario =  mysqli_real_escape_string($conexao, trim($_POST["user"]));
    $senha =  mysqli_real_escape_string($conexao, trim($_POST["senha"]));
    $senhaHash = md5($senha);
    $categoria = (isset($_POST['adm'])) ? 1 : 0;

    $queryinsere = "INSERT INTO `tb01_login`(`tb01_usuario`, `tb01_senha`, `tb01_categoria`, `tb01_ativo`) VALUES ('".$usuario."', '".$senhaHash."', $categoria, 0)";
    $resultadoinsere = mysqli_query($conexao, $queryinsere);

    // if($resultadoinsere){
    //     header ("Location: ../../testes/form_plans.html");
    // }else{
    //     echo "Erro: ". mysqli_error($conexao);
    // }
	
?>