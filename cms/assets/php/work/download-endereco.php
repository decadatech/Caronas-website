<?php

    include_once "../../../../assets/php/conexao.php";

    $codigo = $_GET["id"];	
        
    $query = "SELECT * FROM `tb05_work` WHERE `tb05_id` = $codigo";
    $result = $conexao->query($query);

    if($result->num_rows>0) { 
        while ($linha = $result->fetch_assoc()){   
            $file = "../../../../assets/img/work/endereco/".$linha["tb05_endereco"];
            $ext = explode(".", $linha["tb05_endereco"]);
            $novoNome = $linha["tb05_nome"]."_Comprovante_Residencia.".$ext[1];
        }
    }

    header("Content-Type: application/octet-stream");
    header("Content-Disposition: attachment; filename=" . $novoNome);   
    header("Content-Type: application/force-download");
    header("Content-Type: application/octet-stream");
    header("Content-Type: application/download");
    header("Content-Description: File Transfer");            
    header("Content-Length: " . filesize($file));
    flush(); // this doesn't really matter.
    $fp = fopen($file, "r");
    while (!feof($fp))
    {
        echo fread($fp, 65536);
        flush(); // this is essential for large downloads
    } 
    fclose($fp);
?>