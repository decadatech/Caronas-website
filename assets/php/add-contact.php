<?php
    include_once "conexao.php";
    

    $nome = mysqli_real_escape_string($conexao, trim($_POST['name']));
    $cidadeS = mysqli_real_escape_string($conexao, trim($_POST['cidade0']));
    $estadoS = substr($cidadeS,-2);
    $cidadeS = substr($cidadeS, 0, -5);
    $cidadeC = mysqli_real_escape_string($conexao, trim($_POST['cidade1']));
    $estadoC = substr($cidadeC,-2);
    $cidadeC = substr($cidadeC, 0, -5);
    $telefone = mysqli_real_escape_string($conexao, trim($_POST['phone']));
    $horaS = mysqli_real_escape_string($conexao, trim($_POST['end']));
    $horaS = str_replace('/', '-', $horaS);
    $horaS = date("Y/m/d H:i:00", strtotime($horaS));       
    $passageiros = mysqli_real_escape_string($conexao, trim($_POST['quantity']));
    $email = mysqli_real_escape_string($conexao, trim($_POST['email']));
    $observacoes = mysqli_real_escape_string($conexao, trim($_POST['description']));

    if(isset($_POST['checkBack'])){
        $horaV = mysqli_real_escape_string($conexao, trim($_POST['back']));
        $horaV = str_replace('/', '-', $horaV);
        $horaV = date("Y/m/d H:i:00", strtotime($horaV));           
        $query = "INSERT INTO `tb03_contato`(`tb03_nome`, `tb03_estado_saida`, `tb03_cidade_saida`, `tb03_estado_chegada`, `tb03_cidade_chegada`, `tb03_telefone`, `tb03_hora_saida`, `tb03_hora_volta`, `tb03_quant_passageiro`, `tb03_email`, `tb03_observacoes`, `tb03_hora_cadastro`) VALUES ('".$nome."', '".$estadoS."', '".$cidadeS."', '".$estadoC."', '".$cidadeC."', '".$telefone."', '".$horaS."', '".$horaV."', '".$passageiros."', '".$email."', '".$observacoes."', NOW())";
    }else{
        $query = "INSERT INTO `tb03_contato`(`tb03_nome`, `tb03_estado_saida`, `tb03_cidade_saida`, `tb03_estado_chegada`, `tb03_cidade_chegada`, `tb03_telefone`, `tb03_hora_saida`, `tb03_quant_passageiro`, `tb03_email`, `tb03_observacoes`, `tb03_hora_cadastro`) VALUES ('".$nome."', '".$estadoS."', '".$cidadeS."', '".$estadoC."', '".$cidadeC."', '".$telefone."', '".$horaS."', '".$passageiros."', '".$email."', '".$observacoes."', NOW())";
    }
    $resultado = mysqli_query($conexao, $query);
?>