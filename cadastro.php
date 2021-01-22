<?php
session_start();

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style_cadastro.css">
    <title>Sistema Bancario</title>
</head>
<body>
    <div class="container">
        <div class="form-cadastro">
            <?php 
                if (isset($_SESSION['status_cadastro'])): 
                    // PROCURA SE CADASTRO EFETUADO JÁ EXISTE
            ?>
            <div>
                <p>Cadastro efetuado com sucesso</p>
            </div>
            <?php
                endif;
                unset($_SESSION ['status_cadastro']);
            ?>
            <?php
                if(isset($_SESSION['usuario_existe'])):
            ?>
            <div>
                <p>Usuario já existe</p>
            </div>
            <?php
                endif;
                unset($_SESSION ['usuario_existe']);
            ?> 
            <img src="img/logo.jpg" alt="Logo">
            <form method="POST" action="efetuar_cadastro.php">
            <h2>Faça seu cadastro</h2>
                <fieldset>
                        <div class="row">
                            <label for="nome"> Nome: </label>
                            <input type="text" name="nome" id="nome" placeholder=" Nome Completo">
                        </div>

                        <div class="row">
                             <label for="email"> Email: </label>
                             <input type="email" name="email" id="email"  placeholder=" 123@email.com">
                        </div>
                        <div class="row">
                            <label for="senha">Senha:</label>
                            <input type="password" name="senha" id="senha"  placeholder=" *****">
                        </div>
                               
                        <fieldset>
                            <label for="agencia">Agência:</label>
                            <input type="text" name="agencia" id="agencia"  placeholder=" Nº Agência">  
                            <label for="op">Operação:</label>
                            <select name="op" id="op" placeholder=" Operação">
                                <option value="Corrente">Corrente</option>
                                <option value="Poupanca">Poupança</option>
                            </select>
                        </fieldset>  

                        <div class="row-cpf">
                            <label for="cpf">CPF:</label>
                            <input type="text" name="cpf" id="cpf"  placeholder=" Somente os numeros">
                        </div>
                        
                        <fieldset>

                            <label for="cidade"> Cidade:</label>
                            <input type="text" name="cidade" id="cidade"  placeholder=" Belo Horizonte ">

                            <label for="estado">Selecione o Estado</label>
                            <select name="estado" id="estado" placeholder="Estado">
                                <option value="Acre">AC</option>
                                <option value="Alagoas">AL</option>
                                <option value="Amapa">AP</option>
                                <option value="Amazonas">AM</option>
                                <option value="Bahia">BA</option>
                                <option value="Ceara">CE</option>
                                <option value="Distrito Federal">DF</option>
                                <option value="Espirito Santo">ES</option>
                                <option value="Goias">GO</option>
                                <option value="Maranhao">MA</option>
                                <option value="Mato Grosso">MT</option>
                                <option value="Mato Grosso do Sul">MS</option>
                                <option value="Minas Gerais" selected>MG</option>
                                <option value="Para">PA</option>
                                <option value="Paraiba">PB</option>
                                <option value="Parana">PR</option>
                                <option value="Pernambuco">PE</option>
                                <option value="Piaui">PI</option>
                                <option value="Rio de Janeiro">RJ</option>
                                <option value="Rio Grande do Norte">RN</option>
                                <option value="Rio Grande do Sul">RS</option>
                                <option value="Rondonia">RO</option>
                                <option value="Roraima">RR</option>
                                <option value="Santa Catarina">SC</option>
                                <option value="Sao Paulo">SP</option>
                                <option value="Sergipe">SE</option>
                                <option value="Tocantins">TO</option>
                            </select>
                        </fieldset>
                    </fieldset>
                    <button type="submit" name="btn-cadastrar" value="btn-cadastrar"> Cadastrar</button>
                     <button class="btn-voltar"><a href="index.php"> Voltar</a></button>
                </form>
        </div>
    </div>
</body>
</html>