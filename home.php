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
    
    <section class="container">
        <div class="jumbortron">
            <h1 class="titulo-jumbortron"> Bem vindo ao Boomerang Bank !</h1>
            <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam bibendum facilisis dictum. 
                In quis ipsum sit amet eros mollis accumsan. Donec sagittis egestas felis nec auctor. 
                Mauris pharetra lacinia orci. Phasellus fringilla sit amet lectus non varius. Vestibulum blandit id diam et 
                consectetur. Duis posuere, dolor sit amet ullamcorper luctus, dui ex gravida augue, nec aliquet sem eros in mi. 
                Donec sed dui lorem. Fusce ultrices pharetra justo ut accumsan. Praesent lorem lorem, tincidunt 
                a venenatis dapibus, commodo vel augue. Suspendisse maximus a ex a interdum.
            </p>
        </div>
    </section>

    <section class ="container">
        <div class="jumbortron-amarelo">
            <h2 class="titulo-cinza"> Acesse seu Boomerang em qualquer lugar ! A hora que quiser.</h2>
            <p>
                Sed nec felis est. Aliquam scelerisque, risus in aliquam pharetra, ipsum erat maximus ipsum, a finibus sem tellus nec nulla. 
                Morbi dolor purus, tristique eget tincidunt eu, semper at ex. In hendrerit, purus ac accumsan consectetur, nisl mi luctus odio, 
                ut tincidunt leo orci a sem. Etiam cursus enim sed mi facilisis porttitor. Aliquam id odio felis. Proin cursus placerat 
                lacus at posuere. Donec lacinia turpis facilisis justo sollicitudin, vel tincidunt elit tincidunt. 
                Ut mattis, turpis a rutrum cursus, ligula risus iaculis eros, et sodales lorem tortor id mauris. 
                Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Aenean ac dictum mauris. 
                Nunc efficitur, libero ac congue convallis, diam lacus pulvinar metus, dictum faucibus nunc lectus sit amet metus. 
                Nullam blandit ipsum et lacus commodo hendrerit vel vitae elit. 
                Aliquam vitae risus ut ipsum iaculis consectetur sit amet feugiat lorem.
            </p>
        </div>

    </section>

    <section class ="container">
        <div class="jumbortron-roxo">
            <h2 class="titulo-branco"> Em breve o novo PIX!</h2>
            <p>
                Nullam id risus tellus. Nulla facilisi. Nulla est urna, tempus tincidunt turpis vitae, eleifend egestas enim. 
                Fusce at neque at eros lacinia feugiat. Nulla fringilla quam sit amet nisi euismod lobortis. Vivamus fermentum quam 
                ac mauris vulputate dictum. Donec lacinia lacinia ante nec luctus. Nunc ac sem orci. Nullam porta posuere odio, 
                a sagittis est facilisis sit amet. Nam semper justo eu ante dignissim viverra. Nulla facilisi. Nunc in nisl elit. 
                In hac habitasse platea dictumst. Proin non euismod augue. Phasellus lobortis risus nec arcu dictum egestas vel ac metus. 
                Duis nec sollicitudin orci, eu vulputate nibh.
            </p>
        </div>
    </section>
    <footer>
         <div id="rodape">
            <img src="img/logo.jpg" alt="Logo">
            <p id="copy">&copy Boomerang Bank</p>
        </div>    
    </footer>
</body>
</html>