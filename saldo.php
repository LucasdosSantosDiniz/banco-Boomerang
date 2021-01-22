<?php

    // ESSA PAGINA SERVE PARA MOSTRAR O SALDO DA CONTA ALEM DO NOME DO USUARIO, AGENCIA, VALOR E ETC.

    require_once 'conexao.php';
    session_start();

    if (!isset($_SESSION['logado'])):
        header('Location: index.php');
    endif;

    $conta = $_SESSION['id_usuario'];

    $sql = "SELECT cl.*, co.* FROM cliente AS cl JOIN conta AS co
    ON (co.num_conta = cl.num_conta) WHERE cl.num_conta = '$conta'
    ORDER BY co.id_conta DESC LIMIT 1";

    $resultado = mysqli_query($conexao, $sql);
    $dados = mysqli_fetch_array($resultado);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos.css">
    <title>Sistema Bancario</title>
</head>
<body>
   <header class="container">
        <div class="cabecalho">
            <h1> OLÁ, <?php echo $dados ['nome']; ?></h1>
            <nav class="menu">
                <ul>
                    <li><a href="home.php">HOME</a></li>
                    <li><a href="depositar.php">DEPOSITAR</a></li>
                    <li><a href="sacar.php">SACAR</a></li>
                    <li><a href="transferir.php">TRANSFERIR</a></li>
                    <li><a href="extrato.php">EXTRATO</a></li>
                    <li><a href="saldo.php">SALDO</a></li>
                    <li> <a href="sair.php">SAIR </a></li>
                </ul>
            </nav>
            <h1 class="imagem"><img id="logo" src="img/logo.jpg" alt="Logo"></h1>
        <div>
    </header>
   <hr>
   <div>
        <table class="info-tabela">
            <tbody>
                <tr><th colspan="2">DADOS DO CLIENTE</th></tr>
            </tbody>
            <tbody>
                <tr>
                    <td>Numero da Conta:</td>
                    <td><?php echo ($dados['num_conta']);?></td>
                </tr>
                <tr>
                    <td>Nome:</td>
                    <td><?php echo ($dados['nome']);?></td>
                </tr>
                <tr>
                    <td>Agência:</td>
                    <td><?php echo ($dados['agencia']);?></td>
                </tr>
                <tr>
                    <td>Operação:</td>
                    <td><?php echo ($dados['operacao']);?></td>
                </tr>
                <tr>
                    <td>Saldo:</td>
                    <td>R$: <?php echo ($dados['saldo']);?></td>
                </tr>
            </tbody>
        </table>
   </div>
   <footer>
         <div id="rodape">
            <img src="img/logo.jpg" alt="Logo">
            <p id="copy">&copy Boomerang Bank</p>
        </div>    
    </footer>
<?php
    mysqli_close($conexao);
?>