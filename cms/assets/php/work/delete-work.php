<?php
    include_once "../login/verificado-login-for-php.php";
    include_once "../../../../assets/php/conexao.php";
    
	$codigo = $_GET["id"];	
	$query = "SELECT * FROM `tb05_work` WHERE `tb05_id` = $codigo";
	$result = $conexao->query($query);
	if($result->num_rows>0) { 
        while ($linha = $result->fetch_assoc()){ 
			$fotoCNH = $linha["tb05_cnh"];       
			$fotoCarro = $linha["tb05_carro"];       
			$fotoEndereco = $linha["tb05_endereco"];       
		}
	} 
	
	$querydelete ="DELETE FROM tb05_work WHERE tb05_id=$codigo";
	$resultadodelete = $conexao->query($querydelete);
	
	if ($resultadodelete) {		
        unlink("../../../../assets/img/work/cnh/".$fotoCNH);		
        unlink("../../../../assets/img/work/carro/".$fotoCarro);		
        unlink("../../../../assets/img/work/endereco/".$fotoEndereco);		
	}else{			
		echo "<h5>Erro ao excluir o currículo<h5>";
	}
	mysqli_close($conexao);
	header ("Location: ../../../work.php");	

?>