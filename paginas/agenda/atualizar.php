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

    echo "<h2>A Reserva foi Alterada com Sucesso! </h2>";
?>
  <header class="d-flex justify-content-end align-items-center p-3">
      <div>
        <a class="btn btn-danger mb-2" href="index.php?escolha=agenda"><i class="bi bi-arrow-return-left"></i> Voltar</a>
      </div>
  </header>