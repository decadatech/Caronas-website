<?php
    include_once "../login/verificado-login-for-php.php";
    include_once "../../../../assets/php/conexao.php";

    $queryinsere1 = "UPDATE `tb02_planos` SET `tb02_ativo_index` = 0 WHERE 1";
    $resultadoinsere1 = mysqli_query($conexao, $queryinsere1);

    if(isset($_POST['plans'])){
	    $checkbox = $_POST['plans'];
        foreach($checkbox as $id){        
            $queryinsere = "UPDATE `tb02_planos` SET `tb02_ativo_index` = 1 WHERE `tb02_id` = '".$id."'";
            $resultadoinsere = mysqli_query($conexao, $queryinsere);
        }
    
        if($resultadoinsere){
            header ("Location: ../../../index.php");
        }else{
            echo "Erro: ". mysqli_error($conexao);
        }
    }else{
        header ("Location: ../../../index.php");
    }
	
?>