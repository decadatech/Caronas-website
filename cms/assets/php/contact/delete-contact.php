<?php
    include_once "../login/verificado-login-for-php.php";
    include_once "../../../../assets/php/conexao.php";
    
    $codigo = $_GET["id"];	

    if (!isset($codigo)){
        header ("Location: ../../../contact.php");	
    }

	$querydelete ="DELETE FROM tb03_contato WHERE tb03_id=$codigo";
	$resultadodelete = $conexao->query($querydelete);
	
	if ($resultadodelete) {	
		header ("Location: ../../../contact.php");	
	}else{			
		echo "<h5>Erro ao excluir o contato<h5>";
	}

	mysqli_close($conexao);

?>