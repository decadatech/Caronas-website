<?php
    include_once "../login/verificado-login-for-php.php";
    include_once "../../../../assets/php/conexao.php";
    
    $query = "SELECT * FROM `tb02_planos` WHERE 1";
    $result = $conexao->query($query);

    if($result->num_rows>0) { 

        while ($linha = $result->fetch_assoc()){    
            echo "<input class='limited' type=checkbox name='plans[]' id='plans[]' value='".$linha["tb02_id"]."'";
            if($linha["tb02_ativo_index"]){            
                echo ' checked';
            }
            echo ">".$linha["tb02_titulo"]." <br/>";  
        }      
         
    }else {
        echo "<br/><h5>Nenhum plano inserido</h5>";
    }        


?>