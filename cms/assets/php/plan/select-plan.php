<?php
    include_once "../login/verificado-login-for-php.php";
    include_once "../../../../assets/php/conexao.php";
    
    $query = "SELECT * FROM `tb02_planos` WHERE 1";
    $result = $conexao->query($query);

    if($result->num_rows>0) { 

        echo    "<div class='table-responsive'>
                    <table class='table mb-0'>
                    <thead class='bg-light'>
                        <tr>
                        <th scope='col' class='border-0'>Plano</th>
                        <th scope='col' class='border-0'>Ações</th>                      
                        </tr>
                    </thead>
                    <tbody>";

        while ($linha = $result->fetch_assoc()){                
            echo "<tr>";
                echo "<td>".$linha["tb02_titulo"]."</td>";
                echo "<td>";     
                echo    "<button href = 'javascript:func()'onclick='editarPlan(".$linha["tb02_id"].")' class='btn btn-success' style='margin:2px;' id='".$linha["tb02_id"]."'
                         data-id='".$linha["tb02_id"]."'
                         data-titulo='".$linha["tb02_titulo"]."'
                         data-price='".$linha["tb02_preco"]."'
                         data-descricao='".$linha["tb02_descricao"]."'> Editar </a></button>";
                echo    "<button href = 'javascript:func()'onclick='confirmarExclusaoPlan(".$linha["tb02_id"].")' class='btn btn-danger' style='margin:2px;'> Excluir </a></button>";
                echo "</td>";
            echo "</tr>";  
        }
        
        
        echo        "</tbody>
            </table>
    </div>";
        
    }else {
        echo "<br/><h5>Nenhuma plano inserido</h5>";
    }        


?>