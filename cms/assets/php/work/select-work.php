<?php
    include_once "../login/verificado-login-for-php.php";
    include_once "../../../../assets/php/conexao.php";
    
    $query = "SELECT * FROM `tb05_work` ORDER BY `tb05_data` desc";
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
                echo "<td>".$linha["tb05_nome"]."</td>";
                echo "<td>".$linha["tb05_telefone"]."</td>";
                echo "<td>".$linha["tb05_email"]."</td>";
                echo "<td>".date("d/m/Y", strtotime($linha["tb05_data"]))."</td>";
                echo "<td>";
                echo    "<button href = 'javascript:func()'onclick='downloadCnh(".$linha["tb05_id"].")' class='btn btn-info' style='margin:0 2px 2px 0' id='".$linha["tb05_id"]."'> CNH </button>";
                echo    "<button href = 'javascript:func()'onclick='downloadCarro(".$linha["tb05_id"].")' class='btn btn-secondary' style='margin:0 2px 2px 0' id='".$linha["tb05_id"]."'> Carro </button>";
                echo    "<button href = 'javascript:func()'onclick='downloadResidencia(".$linha["tb05_id"].")' class='btn btn-dark' style='margin:0 2px 2px 0' id='".$linha["tb05_id"]."'> Residência </button>";
                echo    "<button href = 'javascript:func()'onclick='confirmarExclusaoWork(".$linha["tb05_id"].")' class='btn btn-danger' style='margin:0 2px 2px 0'> Excluir </button>";
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