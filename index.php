<?php

// Conexão com o Banco
require_once 'conexao.php';

//T Trabalhando com sessões

session_start();

// Botão Entrar
if (isset($_POST['btn-entrar'])):
    $erros = array();
    $login = mysqli_escape_string($conexao, $_POST['email']);
    $senha = mysqli_escape_string($conexao, $_POST['senha']);

    if (empty($login) or empty($senha)):
        $erros[] = "<p> O campo usuario/senha não foi preenchido </p>";
    else:
        $sql = "SELECT email FROM cliente WHERE email = '$login'";
        $resultado = mysqli_query($conexao, $sql);

        if(mysqli_num_rows($resultado) > 0):
            $senha = md5($senha);
            $sql = "SELECT * FROM cliente WHERE email = '$login' AND senha = '$senha'";
            $resultado = mysqli_query($conexao,$sql);

            if(mysqli_num_rows($resultado) == 1):
                $dados = mysqli_fetch_array($resultado);
                mysqli_close($conexao);
                $_SESSION['logado'] = true;
                $_SESSION['id_usuario'] = $dados['num_conta'];
                header('Location: home.php');

            else:
                $erros[] = "<p> Usuario ou senha incorretos </p>";
            endif;

        else:
            $erros[] = "<p> Usuario não existe </p>";
        endif;
    endif;
    
endif;

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Boomerang Bank</title>
</head>
<body>
    <div class="container">
        <div class ="form-login">
            <div>
               <?php 
                    if (!empty($erros)):
                        foreach($erros as $erro):
                            echo $erro;
                        endforeach;
                    endif;
               ?>
                <h2>Login</h2>
                <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <input type="email" name="email" id="email" placeholder="123@gmail.com"> <br>

                    <input type="password" name="senha" id="senha" placeholder="******"> <br>
                
                    <button type="submit" name="btn-entrar" value="btn-entrar">Entrar</button><br>
                </form>
                <button type="submit" class="btn-abrir-conta"><a href="cadastro.php">Abrir Conta</a></button>
            </div>
        </div>
        <div class="imagem">
            <h2 class="texto">Bem Vindo ao Boomerang Bank !</h2><br><br><br><br>
            <p class="texto">O banco digital para você.</p>
            <img src="img/logo.jpg" alt="Logo" class="logo">
        </div>
    </div>
</body>
</html>