<?php

// CONECTA SE AO BANCO DE DADOS

session_start();
require_once 'conexao.php';

// RECEBE OS DADOS DO FORMULARIO

$conta_receber = $_SESSION['conta_receber'];
$transferir = $_SESSION['transferir'];
$saldo = 0;
$saldo2 = 0;
$saldo_atual = 0;
$saldo_atual2 = 0;
$conta = $_SESSION['id_usuario'];

// CONSULTA O BANCO DE DADOS

$sql = "SELECT * FROM conta WHERE num_conta = '$conta' ORDER BY id_conta DESC LIMIT 1";
$resultado = mysqli_query($conexao,$sql);
$dados = mysqli_fetch_assoc($resultado);

$saldo_atual = $dados['saldo'];
$saldo = $saldo_atual - $transferir;
if ($saldo < 0 ):
    header('Location:erro_operacao.php');

else:
    
    $sql2 = "SELECT * FROM conta WHERE num_conta = '$conta_receber' ORDER BY id_conta DESC LIMIT 1";
    $resultado2 = mysqli_query($conexao,$sql2);
    $dados2 = mysqli_fetch_array($resultado2);

    $saldo_atual2 = $dados2['saldo'];
    $saldo2 = $saldo_atual2 + $transferir;

    $sql2 = "INSERT INTO conta (num_conta, deposito, saldo, data_conta)
    VALUES ('$conta_receber', '$transferir', '$saldo2', NOW())"; 
    
    
    $sql = "INSERT INTO conta (num_conta, transferencia, saldo, data_conta)
    VALUES ('$conta', '$transferir', '$saldo', NOW())"; 

endif; 

if (mysqli_query($conexao, $sql) === TRUE && mysqli_query($conexao,$sql2) === TRUE):
    $_SESSION['status_cadastro'] = true;
    header('Location:transferencia_sucesso.php');
else:
    echo"<p> </p>";
endif;
mysqli_close($conexao);
exit;

?>
