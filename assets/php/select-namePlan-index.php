<?php
    include_once "conexao.php";
    
    $query = "SELECT * FROM `tb02_planos` ORDER BY `tb02_preco` DESC LIMIT 3";
    $result = $conexao->query($query);

    if($result->num_rows>0) { 
        while ($linha = $result->fetch_assoc()){                
           echo '<div class="item">
                    <h4>'.$linha["tb02_titulo"].'</h4>';
                if($linha["tb02_preco"] != ""){
                    echo '<h5>R$ '.$linha["tb02_preco"].'</h5>';
                }
            echo'
                    <a href="planos.html"><img src="assets/img/next.svg" alt="Seta para direita"></a>
                </div>';
        }
    }
?>