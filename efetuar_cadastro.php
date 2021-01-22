<?php
    session_start();
    require_once 'conexao.php';

    // RECEBE OS DADOS VINDO DO FORMULARIO

    $nome =  mysqli_real_escape_string($conexao,trim($_POST['nome']));
    $email = mysqli_real_escape_string($conexao, trim($_POST['email']));
    $senha = mysqli_real_escape_string($conexao, trim(md5($_POST['senha'])));
    $agencia = mysqli_real_escape_string($conexao, trim($_POST['agencia']));
    $operacao = mysqli_real_escape_string($conexao, trim($_POST['op']));
    $cpf = mysqli_real_escape_string($conexao, trim($_POST['cpf']));
    $cidade = mysqli_real_escape_string($conexao, trim($_POST['cidade']));
    $estado = mysqli_real_escape_string($conexao, trim($_POST['estado']));
    
    // REALIZA CONSULTA NO BANCO DE DADOS

    $sql = "SELECT COUNT(*) AS total FROM cliente WHERE email = '$email'";
    $resultado = mysqli_query($conexao, $sql);
    $row = mysqli_fetch_assoc($resultado);

    if ($row['total'] == 1):
        $_SESSION['usuario_existe'] = true;
        header('Location: cadastro.php');
        exit;
    endif;

    $sql = "INSERT INTO cliente (nome, email, senha, agencia, operacao, cpf, cidade,
            estado, data_cadastro) VALUES('$nome', '$email', '$senha', '$agencia', '$operacao', '$cpf', '$cidade', '$estado', NOW())";
    
    if (mysqli_query($conexao, $sql) === TRUE):
        $_SESSION['status_cadastro'] = true;
    endif;
    mysqli_close($conexao);
    header('Location: cadastro.php');
    exit;
?>