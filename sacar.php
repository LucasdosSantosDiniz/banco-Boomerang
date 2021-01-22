<?php

    // Conexão
    require_once 'conexao.php';

    // Sessão
    session_start();

    // Verificando a sessão
    if (!isset($_SESSION['logado'])):
        header('Location: index.php');
    endif;
     
    // Dados usuarios
    $id = $_SESSION['id_usuario'];
    $sql = "SELECT * FROM cliente WHERE num_conta = '$id'";
    $resultado = mysqli_query($conexao, $sql);
    $dados = mysqli_fetch_array($resultado);
    mysqli_close($conexao);

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
            <h1 class="imagem"><img id="logo"  src="img/logo.jpg" alt="Logo"></h1>
        <div>
    </header>
    <hr>

    <div class="container">
        <div id="operacoes">
            <h2 class="titulo-operacoes"> DESEJA SACAR QUANTO <?php echo $dados ['nome']; ?></h2>
            <fieldset>
                <form method="post" action="sacando_conta.php">
                    <input type="number" name="saque" id="saque" placeholder = " R$ 0,00"><br><br>
                    <input type="submit" value="Sacar">
                    <button class="btn-voltar"><a class="voltar" href="home.php"> Voltar </a></button>
                </form>
           
            </fieldset>
            
        </div>
    </div>

    <footer>
         <div id="rodape">
            <img src="img/logo.jpg" alt="Logo">
            <p id="copy">&copy Boomerang Bank</p>
        </div>    
    </footer>
</body>
</html>