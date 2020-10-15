<?php
    include_once "../login/verificado-login-for-php.php";
    include_once "../../../../assets/php/conexao.php";
    
    $codigo = $_GET["id"];	
	
	$querydelete ="DELETE FROM tb01_login WHERE tb01_id=$codigo";
	$resultadodelete = $conexao->query($querydelete);
	
	if ($resultadodelete) {		
		header ("Location: ../../../user.php");	
	}else{			
		echo "<h5>Erro ao excluir o usuário<h5>";
	}
	mysqli_close($conexao);

?>