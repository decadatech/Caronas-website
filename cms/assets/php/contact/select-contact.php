<?php
    include_once "../login/verificado-login-for-php.php";
    include_once "../../../../assets/php/conexao.php";
    
    $query = "SELECT * FROM `tb03_contato` ORDER BY `tb03_hora_cadastro` desc";
    $result = $conexao->query($query);

    if($result->num_rows>0) { 

        echo    "<div class='table-responsive'>
                    <table class='table mb-0'>
                    <thead class='bg-light'>
                        <tr>
                        <th scope='col' class='border-0'>Nome</th>                        
                        <th scope='col' class='border-0'>Telefone</th>
                        <th scope='col' class='border-0'>E-mail</th>        
                        <th scope='col' class='border-0'>Cadastro</th>                                                                
                        <th scope='col' class='border-0'>Ações</th>
                        </tr>
                    </thead>
                    <tbody>";

        while ($linha = $result->fetch_assoc()){
            $horaV = "Sem Volta";
            if(!is_null($linha["tb03_hora_volta"])){
                $horaV = date("d/m/Y H:i:s", strtotime($linha["tb03_hora_saida"]));
            }

            echo "<tr>";
                echo "<td>".$linha["tb03_nome"]."</td>";
                echo "<td>".$linha["tb03_telefone"]."</td>";
                echo "<td>".$linha["tb03_email"]."</td>";
                echo "<td>".date("d/m/Y H:i:s", strtotime($linha["tb03_hora_cadastro"]))."</td>";
                echo "<td>";
                echo    "<button href = 'javascript:func()'onclick='viewContact(".$linha["tb03_id"].")' class='btn btn-info' style='margin:0 2px 2px 0' id='".$linha["tb03_id"]."'
                        data-nome='".$linha["tb03_nome"]."'
                        data-cidadeS='".$linha["tb03_cidade_saida"]."'
                        data-cidadeC='".$linha["tb03_cidade_chegada"]."'
                        data-horaS='".date("d/m/Y H:i:s", strtotime($linha["tb03_hora_saida"]))."'
                        data-horaV='".$horaV."'
                        data-quant='".$linha["tb03_quant_passageiro"]."'
                        data-desc='".$linha["tb03_observacoes"]."'> Informações </button>";
                echo    "<button href = 'javascript:func()'onclick='confirmarExclusaoContact(".$linha["tb03_id"].")' class='btn btn-danger' style='margin:0 2px 2px 0'> Excluir </a></button>";
                echo "</td>";
            echo "</tr>";  
        }
        
        
        echo        "</tbody>
            </table>
    </div>";
        
    }else {
        echo "<br/><h5> Não há contatos por enquanto... </h5>";
    }        


?>