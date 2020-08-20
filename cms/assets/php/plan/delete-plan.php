<?php
    include_once "../login/verificado-login-for-php.php";
    include_once "../../../../assets/php/conexao.php";
    
	$codigo = $_POST["idDelete"];	
	
	$query = "SELECT * FROM `tb02_planos` WHERE tb02_id=$codigo";
	$result = $conexao->query($query);
	if($result->num_rows>0) { 
		while ($linha = $result->fetch_assoc()){ 
			$fotoBanco = $linha["tb02_imagem"];       
		}
	} 

	$querydelete ="DELETE FROM tb02_planos WHERE tb02_id=$codigo";
	$resultadodelete = $conexao->query($querydelete);
	
	if ($resultadodelete) {		
		unlink("../../../../assets/img/plan/".$fotoBanco);	
	}else{			
		echo "<h2>Erro ao excluir a plano<h2>";
	}
	mysqli_close($conexao);

	header ("Location: ../../../plans.php");		


?>