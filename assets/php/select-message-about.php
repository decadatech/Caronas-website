<?php
    include_once "conexao.php";
    
    $query = "SELECT * FROM `tb04_sobre` WHERE 1 LIMIT 1";
    $result = $conexao->query($query);

    if($result->num_rows>0) { 
        while ($linha = $result->fetch_assoc()){                
           echo $linha["tb04_mensagem"];
        }
    }  s
?>