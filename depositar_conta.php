<?php

session_start();
require_once 'conexao.php';

// CONSULTA SE O USUARIO ESTÁ REALMENTE LOGADO

if (!$_SESSION['logado']) {
		
    header('Location: index.php?erro=1');
}

// VARIAVEIS QUE RECEBERAM OS DADOS DA SESSION E DO POST RECEBIDO ATRAVES DO FORMULARIO

$deposito = $_POST['deposito'];
$saldo = 0;
$conta = $_SESSION['id_usuario'];
$saldo_atual= 0;

// REALIZA A CONSULTA NO BANCO DE DADOS

$sql = "SELECT * FROM conta WHERE num_conta = '$conta' ORDER BY id_conta DESC limit 1";
$resultado = mysqli_query($conexao, $sql);
$dados = mysqli_fetch_array($resultado);

$saldo_atual = $dados['saldo'];
$saldo = $saldo_atual + $deposito;

$sql = "INSERT INTO conta(num_conta, deposito, saldo, data_conta) 
VALUES('$conta', '$deposito', '$saldo', NOW())";

if (mysqli_query($conexao, $sql) === TRUE):
    $_SESSION['status_cadastro'] = true;
    header('Location: mostrar_deposito.php');
else:
    echo"<p> Erro ao se conectar <p>";
endif;
mysqli_close($conexao);
exit;
?>


