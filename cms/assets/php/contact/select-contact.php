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
            echo "<tr>";
                echo "<td>".$linha["tb03_nome"]."</td>";
                echo "<td>".$linha["tb03_telefone"]."</td>";
                echo "<td>".$linha["tb03_email"]."</td>";
                echo "<td>".date("d/m/Y H:i:s", strtotime($linha["tb03_hora_cadastro"]))."</td>";
                echo "<td>";
                echo    "<button href = 'javascript:func()'onclick='viewPurchase(".$linha["tb03_id"].")' class='btn btn-info' style='margin-right:10px' id='".$linha["tb03_id"]."'
                        data-estadoS='".$linha["tb03_estado_saida"]."'
                        data-cidadeS='".$linha["tb03_cidade_saida"]."'
                        data-estadoC='".$linha["tb03_cidade_chegada"]."'
                        data-cidadeC='".$linha["tb03_cidade_chegada"]."'
                        data-horaS='".$linha["tb03_hora_saida"]."'
                        data-quant='".$linha["tb03_quant_passageiro"]."'
                        data-desc='".$linha["tb03_observacoes"]."'> Informações </button>";
                echo    "<button href = 'javascript:func()'onclick='confirmarExclusaoUser(".$linha["tb03_id"].")' class='btn btn-danger'> Excluir </a></button>";
                echo "</td>";
            echo "</tr>";  
        }
        
        
        echo        "</tbody>
            </table>
    </div>";
        
    }else {
        echo "<h2> Não há contatos por enquanto... </h2>";
    }        


?>