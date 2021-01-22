<?php

    require_once 'conexao.php';
    session_start();

    // VERIFICA SE O USUARIO ESTA LOGADO

    if (!isset($_SESSION['logado'])):
        header('Location: index.php');
    endif;

    $conta = $_SESSION['id_usuario'];

    // REALIZA CONSULTA NO BANCO DE DADOS 

    $sql = "SELECT cl.*, co.* FROM cliente AS cl JOIN conta AS co
    ON (co.num_conta = cl.num_conta) WHERE cl.num_conta = '$conta'";

    $resultado = mysqli_query($conexao, $sql);
    $dados = mysqli_fetch_array($resultado);
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
                <th>
                     Número da Conta
                </th>

                <th>
                     Nome
                </th>
                <th>
                     Deposito
                </th>
                <th>
                     Saque
                </th>
                <th>
                    Transferência
                </th>
                <th>
                    Saldo
                </th>
                <th>
                    Data
                </th>
            </tbody>
            <tbody>
                <?php while ( $dados = mysqli_fetch_array($resultado)) { ?>
                 
                <tr>
                    <td>   <?php echo ($dados['num_conta']);?></td>
                    <td>   <?php echo ($dados['nome']);?></td>
                    <td>   <?php echo ($dados['deposito']);?></td>
                    <td>   <?php echo ($dados['saque']);?></td>
                    <td>   <?php echo ($dados['transferencia']);?></td>
                    <td>   <?php echo ($dados['saldo']);?></td>
                    <td>   <?php echo date("d/m/Y",strtotime($dados['data_conta'])); ?></td>
                </tr>
            </tbody>
           <?php }      
           ?>
        </table>
   </div>
   <footer>
         <div id="rodape">
            <img src="img/logo.jpg" alt="Logo">
            <p id="copy">&copy Boomerang Bank</p>
        </div>    
    </footer>
</html>
<?php
    mysqli_close($conexao);
?>