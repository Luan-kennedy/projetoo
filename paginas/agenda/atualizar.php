
<header><h2>Atualizar</h2></header>

<?php

$idalterar = mysqli_real_escape_string($conexao,$_POST["id"]);
$nomealterar = mysqli_real_escape_string($conexao,$_POST["nome"]);
$telefonealterar = mysqli_real_escape_string($conexao,$_POST["telefone"]);
$emailalterar = mysqli_real_escape_string($conexao,$_POST["email"]);
$dataalterar = mysqli_real_escape_string($conexao,$_POST["dataa"]);
$horaalterar = mysqli_real_escape_string($conexao,$_POST["hora"]);

$sql = "UPDATE cliente SET nome = '{$nomealterar}', telefone = '{$telefonealterar}', email = '{$emailalterar}',
 dataa = '{$dataalterar}', hora = '{$horaalterar}' WHERE id = '{$idalterar}'";

 mysqli_query($conexao,$sql) or die ("Erro ao executar cadastro." . mysqli_error($conexao));

    echo "A Reserva foi Alterada com Sucesso! ";
?>