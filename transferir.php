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

    <div class="container">
        <div class="transferencia">
            <h2 class="titulo-operacoes"> DESEJA TRANSFERIR QUANTO <?php echo $dados ['nome']; ?> ?</h2>
            <fieldset>
                <form method="post" action="fazendo_transferencia.php">
                    <input type="number" name="transferir" id="transferir" placeholder = " R$ 0,00" required><BR></BR>
                    <hr>
                    <h2 class="titulo-operacoes" style="text-align:center"> PRA QUAL CONTA DESEJA TRANSFERIR ?</h2> <br>
                    <select name="conta_receber" id="conta_receber" required>
                        <option value="">
                            <?php 
                                $sql2 = "SELECT * FROM cliente";
                                $resultado2 = mysqli_query($conexao, $sql2);
                                while ($dados2 = mysqli_fetch_assoc($resultado2)) {
                                $conta = $dados2['num_conta'];
                                echo "<option value ='$conta'> $conta </option>";
                                }
                            ?>
                        
                        </option>
                    
                    </select><br><br><br><br>
                    <input type="submit" value="Transferir">
                    <button class="btn-voltar"><a class="voltar" href="home.php"> Voltar</a></button>
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
<?php
mysqli_close($conexao);


?>