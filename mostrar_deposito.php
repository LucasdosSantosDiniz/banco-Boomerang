<?php
    session_start();
    require_once 'conexao.php';

    // ESSA PAGINA SERVE PARA MOSTRAR O DEPOSITO, ALEM DO NOME DO USUARIO, AGENCIA, VALOR E ETC.
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

    <div>
        <?php
            if(isset($_SESSION['status_cadastro'])):
        ?>
            <table class="info-tabela">
                <?php 
                    $sql = "SELECT cl.*, co.* FROM cliente AS cl JOIN conta AS co
                    ON (co.num_conta = cl.num_conta) ORDER BY co.id_conta DESC LIMIT 1";

                    $resultado = mysqli_query($conexao, $sql);
                    $dados = mysqli_fetch_assoc($resultado);
                ?>
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
                        <td>Deposito:</td>
                        <td> R$: <?php echo ($dados['deposito']);?></td>
                    </tr>
                    <tr>
                        <td>Saldo:</td>
                        <td>R$: <?php echo ($dados['saldo']);?></td>
                    </tr>
                    <tr>
                        <td>Data:</td>
                        <td><?php echo date("d/m/Y",strtotime($dados['data_conta'])); ?></td>
                    </tr>
                </tbody>
            </table><br>
            <?php endif; ?>

        </div>

     <footer>
         <div id="rodape">
            <img src="img/logo.jpg" alt="Logo">
            <p id="copy">&copy Boomerang Bank</p>
        </div>    
    </footer>
</body>
</html>
<?php

mysqli_close($conexao);

?>