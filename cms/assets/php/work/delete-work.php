<?php
    include_once "../login/verificado-login-for-php.php";
    include_once "../../../../assets/php/conexao.php";
    
    $codigo = $_GET["id"];	
	
	$querydelete ="DELETE FROM tb05_work WHERE tb05_id=$codigo";
	$resultadodelete = $conexao->query($querydelete);
	
	if ($resultadodelete) {		
		header ("Location: ../../../work.php");	
	}else{			
		echo "<h2>Erro ao excluir o currículo<h2>";
	}
	mysqli_close($conexao);

?>