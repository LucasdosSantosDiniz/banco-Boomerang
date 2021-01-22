<?php

// ESSA PAGINA SERVE PARA O VALOR QUE SERÁ SACADO DA CONTA.

session_start();
require_once 'conexao.php';

if (!$_SESSION['logado']) {
		
    header('Location: index.php?erro=1');
}


$saque = $_POST['saque'];
$saldo = 0;
$conta = $_SESSION['id_usuario'];
$saldo_atual= 0;

$sql = "SELECT * FROM conta WHERE num_conta = '$conta' ORDER BY id_conta DESC limit 1";
$resultado = mysqli_query($conexao, $sql);
$dados = mysqli_fetch_array($resultado);

$saldo_atual = $dados['saldo'];
$saldo = $saldo_atual - $saque;

if ($saldo < 0):
    header('Location:erro_operacao.php');
    
else: 
    $sql = "INSERT INTO conta(num_conta, saque, saldo, data_conta) 
    VALUES('$conta', '$saque', '$saldo', NOW())";
endif;

if (mysqli_query($conexao, $sql) === TRUE):
    $_SESSION['status_cadastro'] = true;
    header('Location: mostrar_saque.php');
endif;
mysqli_close($conexao);
exit;


?>