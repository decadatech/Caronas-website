<?php

	include_once "conexao.php";
	date_default_timezone_set('America/Sao_Paulo');

	$nome =  mysqli_real_escape_string($conexao, trim($_POST["name"]));
	$telefone = mysqli_real_escape_string($conexao, trim($_POST["phone"]));
	$email =  mysqli_real_escape_string($conexao, trim($_POST["email"]));
	$mensagem =  mysqli_real_escape_string($conexao, trim($_POST["message"]));

	$imagemCNH = $_FILES['cnh']['name'];
    $imagemtempCNH = $_FILES['cnh']['tmp_name'];
    $extensaoCNH = pathinfo ( $imagemCNH, PATHINFO_EXTENSION );    
    $extensaoCNH = strtolower ( $extensaoCNH );
    $novoNomeCNH = uniqid('c') . '.' . $extensaoCNH;
    move_uploaded_file($imagemtempCNH, "../img/work/cnh/".$novoNomeCNH);

    $imagemCARRO = $_FILES['carro']['name'];
    $imagemtempCARRO = $_FILES['carro']['tmp_name'];
    $extensaoCARRO = pathinfo ( $imagemCARRO, PATHINFO_EXTENSION );    
    $extensaoCARRO = strtolower ( $extensaoCARRO );
    $novoNomeCARRO = uniqid('ca') . '.' . $extensaoCARRO;
    move_uploaded_file($imagemtempCARRO, "../img/work/carro/".$novoNomeCARRO);

    $imagemENDERECO = $_FILES['endereco']['name'];
    $imagemtempENDERECO = $_FILES['endereco']['tmp_name'];
    $extensaoENDERECO = pathinfo ( $imagemENDERECO, PATHINFO_EXTENSION );    
    $extensaoENDERECO = strtolower ( $extensaoENDERECO );
    $novoNomeENDERECO = uniqid('e') . '.' . $extensaoENDERECO;
    move_uploaded_file($imagemtempENDERECO, "../img/work/endereco/".$novoNomeENDERECO);

    $queryinsere = "INSERT INTO `tb05_work`(`tb05_nome`, `tb05_telefone`, `tb05_email`, `tb05_mensagem`, `tb05_cnh`, `tb05_carro`, `tb05_endereco`, `tb05_data`) VALUES ('".$nome."','".$telefone."','".$email."', '".$mensagem."', '".$novoNomeCNH."', '".$novoNomeCARRO."', '".$novoNomeENDERECO."', NOW())";
    $resultadoinsere = mysqli_query($conexao, $queryinsere);
    
?>