<?php
    include_once "conexao.php";

    $nome = mysqli_real_escape_string($conexao, trim($_POST['name']));
    $estadoS = mysqli_real_escape_string($conexao, trim($_POST['estado0']));
    $cidadeS = mysqli_real_escape_string($conexao, trim($_POST['cidade0']));
    $estadoC = mysqli_real_escape_string($conexao, trim($_POST['estado1']));
    $cidadeC = mysqli_real_escape_string($conexao, trim($_POST['cidade1']));
    $telefone = mysqli_real_escape_string($conexao, trim($_POST['phone']));
    $horaS = mysqli_real_escape_string($conexao, trim($_POST['end']));
    $passageiros = mysqli_real_escape_string($conexao, trim($_POST['quantity']));
    $email = mysqli_real_escape_string($conexao, trim($_POST['email']));
    $observacoes = mysqli_real_escape_string($conexao, trim($_POST['description']));

    $query = "INSERT INTO `tb03_contato`(`tb03_nome`, `tb03_estado_saida`, `tb03_cidade_saida`, `tb03_estado_chegada`, `tb03_cidade_chegada`, `tb03_telefone`, `tb03_hora_saida`, `tb03_quant_passageiro`, `tb03_email`, `tb03_observacoes`, `tb03_hora_cadastro`) VALUES ('".$nome."', '".$estadoS."', '".$cidadeS."', '".$estadoC."', '".$cidadeC."', '".$telefone."', '".$horaS."', '".$passageiros."', '".$email."', '".$observacoes."', NOW())";
    $resultado = mysqli_query($conexao, $query);

?>