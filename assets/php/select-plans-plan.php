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
                    <img src="assets/img/plan/'.$linha['tb02_imagem'].'" alt="Imagem de '.$linha['tb02_titulo'].'">
                    <h4>'.$linha['tb02_titulo'].'</h4>
                    <p>'.$linha['tb02_descricao'].'</p>';
                    if($linha["tb02_preco"] != ""){
                      echo '<h5>A partir de <b style="color:rgb(0, 132, 255)">R$ '.$linha["tb02_preco"].'</b></h5>';
                    }
            echo '</div>';
            if($i == 2){
                echo ' </section>';
            }     
            $i++;
        }
    }  


?>