<?php
    include_once "conexao.php";
    
    $query = "SELECT * FROM `tb02_planos` WHERE `tb02_ativo_index` = 1";
    $result = $conexao->query($query);

    if($result->num_rows>0) { 
        while ($linha = $result->fetch_assoc()){                
           echo '<div class="plano">
                    <h4>'.$linha['tb02_titulo'].'</h4>
                    <img src="assets/img/plan/'.$linha['tb02_imagem'].'" alt="Imagem de '.$linha['tb02_titulo'].'">
                    <p>'.$linha['tb02_descricao'].'</p>
                </div>';
        }
    }  


?>