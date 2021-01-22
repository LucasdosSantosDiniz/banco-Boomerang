<?php

// CONECTA AO BANCO DE DADOS
require_once 'conexao.php';
session_start();

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos.css">
    <title>Boomerang Bank</title>
</head>
<body>
          
    <header class="container">
        <div class="cabecalho">
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
   
    <section>
       <?php 
            $conta_receber = $_POST['conta_receber'];
            $transferir = $_POST['transferir'];
           
        ?>
        <table class="info-tabela">
           <?php
                // REALIZA CONSULTA NO BANCO DE DADOS
                $sql = "SELECT cl.*, co.* FROM cliente AS cl JOIN conta AS co
                ON (co.num_conta = cl.num_conta) WHERE cl.num_conta = '$conta_receber'
                ORDER BY co.id_conta DESC LIMIT 1";

                $resultado = mysqli_query($conexao, $sql);
                $dados = mysqli_fetch_assoc($resultado);

                $_SESSION['conta_receber'] = $conta_receber;
                $_SESSION['transferir'] = $transferir;

            ?>
            <tbody>
                <tr><th colspan="2">DADOS DO CLIENTE</th></tr>
            </tbody>
            <tbody>
                    <tr>
                        <td>Numero da Conta:</td>
                        <td><?php echo ($conta_receber);?></td>
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
                        <td>Transferencia:</td>
                        <td> R$: <?php echo ($transferir);?></td>
                    </tr>
                    <tr>
                        <td><button class="btn-confirmar"><a class="confirmar" href="finalizando_transferencia.php">Confirmar</a></button></td>
                        <td><button class="btn-cancelar"><a class="cancelar" href="home.php"> Cancelar </a></button></td>
                    </tr>
            </tbody>
        </table>
    </section>

    <footer>
         <div id="rodape">
            <img src="img/logo.jpg" alt="Logo">
            <p id="copy">&copy Boomerang Bank</p>
        </div>    
    </footer>
</body>
</html>



