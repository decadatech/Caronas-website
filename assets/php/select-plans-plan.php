<?php
    include_once "conexao.php";
    
    $query = "SELECT * FROM `tb02_planos` WHERE 1";
    $result = $conexao->query($query);

    if($result->num_rows>0) { 
        $i = 3;
        while ($linha = $result->fetch_assoc()){           
            if($i == 3){
                echo ' <section class="planos">';
                $i = 0;
            }     
            echo '<div class="plano">
                    <h4>'.$linha['tb02_titulo'].'</h4>
                    <img src="assets/img/plan/'.$linha['tb02_imagem'].'" alt="Foto de '.$linha['tb02_titulo'].'">
                    <p>'.$linha['tb02_descricao'].'</p>
                    <button>Agendar</button>
                </div>';
            if($i == 2){
                echo ' </section>';
            }     
            $i++;
        }
    }  


?>