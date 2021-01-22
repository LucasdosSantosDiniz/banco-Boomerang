<?php
// CONEXÃO COM O BANCO DE DADOS
$host = "localhost";
$username = "root";
$password = "";
$banco = "boomerang_bank";

$conexao = mysqli_connect($host,$username,$password,$banco);

if (mysqli_connect_error()): 
    echo "Falha na conexão: ". mysqli_connect_error();
endif;

?>